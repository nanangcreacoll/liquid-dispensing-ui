<?php

namespace App\Http\Controllers;

use App\Models\DispensingData;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DispensingDataRequest;
use Illuminate\Support\Facades\Cache;

class DispensingDataController extends Controller
{
    public function kendaliView()
    {
        $dispensingStatusSession = Cache::get('dispensing-status', true);
        return view("kendali", ['dispensingStatusSession' => $dispensingStatusSession]);
    }

    public function riwayatView()
    {
        $tableData = DispensingData::all();
        return view("riwayat", ['data' => $tableData]);
    }

    public function store(DispensingDataRequest $request): JsonResponse
    {
        $data = $request->validated();

        $dispensingData = new DispensingData();
        $dispensingData->volume = $data['volume'];
        $dispensingData->capsule_qty = $data['capsuleQty'];
        $dispensingData->user_id = Auth::id();
        $dispensingData->save();

        return response()->json(['success' => true]);
    }

    public function publish(DispensingDataRequest $request): JsonResponse
    {
        $data = $request->validated();

        $qos = MqttClient::QOS_AT_MOST_ONCE;
        $mqtt = MQTT::connection();
        $topic = env('PUBLISH_TOPIC');
        $mqtt->publish($topic, json_encode($data), $qos);

        $timestamp = date('Y-m-d H:i:s') . '.' . substr((string)microtime(true), -3);
        $csvData = $timestamp . ';' . json_encode($data) . "\n";
        $filePath = storage_path('app/mqtt_publish.csv');
        if (!file_exists($filePath)) {
            touch($filePath);
        }
        file_put_contents($filePath, $csvData, FILE_APPEND);

        $mqtt->loop(true, true);

        return response()->json(['success' => true]);
    }
}
