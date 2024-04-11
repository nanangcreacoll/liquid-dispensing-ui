<?php

namespace App\Http\Controllers;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\DispensingDataRequest;

class DispensingDataController extends Controller
{
    public function kendaliView()
    {
        return view("kendali");
    }

    public function riwayatView()
    {
        return view("riwayat");
    }

    public function dispensingData(DispensingDataRequest $request): JsonResponse
    {
        $data = $request->validated();

        $qos = MqttClient::QOS_EXACTLY_ONCE;
        $mqtt = MQTT::connection();
        $topic = 'dispensing/data';
        $mqtt->publish($topic, json_encode($data), $qos);
        $mqtt->loop(true, true);

        return response()->json(['success' => true]);
    }
}
