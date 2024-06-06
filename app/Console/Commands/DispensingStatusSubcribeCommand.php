<?php

namespace App\Console\Commands;

use PhpMqtt\Client\MqttClient;
use Illuminate\Console\Command;
use App\Events\DispensingStatus;
use Illuminate\Support\Facades\Cache;
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
        $topic = env('SUBSCRIBE_TOPIC');
        $qos = MqttClient::QOS_AT_MOST_ONCE;
        $mqtt = MQTT::connection();

        pcntl_async_signals(true);
        pcntl_signal(SIGINT, function () use ($mqtt) {
            $this->info("\nTerminating MQTT subscriber.\n");
            $mqtt->interrupt();
            exit(0);
        });

        $this->info("\nSubcribed to topic: {$topic}\n");
        $mqtt->subscribe($topic, function ($topic, $message) {
            $timestamp = date('Y-m-d H:i:s') . '.' . substr((string)microtime(true), -3);

            $csvData = $timestamp . ';' . $message . "\n";
            $filePath = storage_path('app/mqtt_subscribe.csv');
            if (!file_exists($filePath)) {
                touch($filePath);
            }
            file_put_contents($filePath, $csvData, FILE_APPEND);

            $this->info("{$timestamp} Received message from {$topic}! \n\t{$message}");

            $status = json_decode($message);

            Cache::put('dispensing-status', $status->status ? "true" : "false", 60*60*8);

            event(new DispensingStatus($status->status));
        }, $qos);

        try {
            $mqtt->loop(true);
        } catch (\Exception $e) {
            $this->error("An error occurred: " . $e->getMessage());
            return 1;
        }
    }
}
