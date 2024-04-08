<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\MqttClient;
use App\Events\DispensingStatus;
use PhpMqtt\Client\Facades\MQTT;
use App\Events\DispensingStatusReceived;

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
}
