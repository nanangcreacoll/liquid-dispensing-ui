<?php

namespace App\Console\Commands;

use PhpMqtt\Client\MqttClient;
use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class MqttSubscribeTopic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mqtt-subscribe-topic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to MQTT topic.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $qos = MqttClient::QOS_EXACTLY_ONCE;
        $mqtt = MQTT::connection();
        $mqtt->subscribe('laravel/mqtt/test', function (string $topic, string $message) {
            $this->info('Received message on topic '. $topic .': '. PHP_EOL .''. $message);
        }, $qos);
        $mqtt->loop(true);
    }
}
