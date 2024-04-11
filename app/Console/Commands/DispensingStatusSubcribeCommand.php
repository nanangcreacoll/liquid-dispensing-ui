<?php

namespace App\Console\Commands;

use App\Events\DispensingStatus;
use PhpMqtt\Client\MqttClient;
use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class DispensingStatusSubcribeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispensing-status-subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to Dispensing Status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $topic = 'dispensing/status';
        $qos = MqttClient::QOS_EXACTLY_ONCE;

        $mqtt = MQTT::connection();
        printf("\nSubcribed to topic: %s\n", $topic);
        $mqtt->subscribe($topic, function ($topic, $message) {
            printf("\nReceived message!\n%s\n", $message);
            
            $status = json_decode($message, true)['status'];

            event(new DispensingStatus($status));
        }, $qos);

        $mqtt->loop(true);
    }
}
