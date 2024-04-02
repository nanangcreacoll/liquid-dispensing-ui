<?php

namespace App\Console\Commands;

use PhpMqtt\Client\MqttClient;
use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class MqttPublishTopic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mqtt-publish-topic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish to MQTT topic.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $message = 
            '{
                "msg": "hello"
            }';
        $topic = 'laravel/mqtt/test';
        $qos = MqttClient::QOS_EXACTLY_ONCE;
        $mqtt = MQTT::connection();
        $mqtt->publish($topic, $message, $qos);
        $this->info('Message published to topic ' . $topic);
        $mqtt->loop(true);
    }
}
