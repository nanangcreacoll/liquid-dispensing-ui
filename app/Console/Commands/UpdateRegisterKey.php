<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RegisterKey;

class UpdateRegisterKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-register-key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Register Key';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $newKey = bin2hex(random_bytes(32));
        if (RegisterKey::first()) {
            RegisterKey::first()->update(['key' => $newKey]);
        } else {
            RegisterKey::create(['key' => $newKey]);
        }
        $this->info('Register key updated successfully.');
    }
}
