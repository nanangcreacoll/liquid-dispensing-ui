<?php

namespace Database\Seeders;

use App\Models\RegisterKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegisterKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegisterKey::create([
            'key' => bin2hex(random_bytes(32))
        ]);
    }
}
