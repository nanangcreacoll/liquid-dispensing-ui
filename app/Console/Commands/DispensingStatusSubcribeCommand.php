<?php

namespace App\Console\Commands;

use PhpMqtt\Client\MqttClient;
use Illuminate\Console\Command;
use App\Events\DispensingStatus;
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

        $this->info("\nSubcribed to topic: {$topic}\n");
        $mqtt->subscribe($topic, function ($topic, $message) {
            $this->info("Received message! \n{$message}\n");

            $status = json_decode($message);

            event(new DispensingStatus($status->status));
        }, $qos);

        $mqtt->loop(true, true);
    }
}
