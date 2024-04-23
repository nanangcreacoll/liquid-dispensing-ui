<?php

namespace App\Http\Controllers;

use App\Models\DispensingData;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\DispensingDataRequest;

class DispensingDataController extends Controller
{
    public function kendaliView()
    {
        return view("kendali");
    }

    public function riwayatView()
    {
        $tableData = DispensingData::all();
        return view(
            "riwayat",
            [
                'data' => $tableData
            ]
        );
    }

    public function store(DispensingDataRequest $request): JsonResponse
    {
        $data = $request->validated();

        $qos = MqttClient::QOS_AT_MOST_ONCE;
        $mqtt = MQTT::connection();
        $topic = 'dispensing/data';
        $mqtt->publish($topic, json_encode($data), $qos);
        $mqtt->loop(true, true);

        $dispensingData = new DispensingData();
        $dispensingData->volume = $data['volume'];
        $dispensingData->capsule_qty = $data['capsuleQty'];
        $dispensingData->user_id = Auth::id();
        $dispensingData->save();

        return response()->json(['success' => true]);
    }
}
