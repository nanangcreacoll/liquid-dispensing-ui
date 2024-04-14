<?php

namespace Database\Seeders;

use App\Models\DispensingData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DispensingDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            DispensingData::create([
                'volume' => rand(1, 50),
                'capsule_qty' => rand(1,5),
                'user_id' => rand(1, 3)
            ]);
        }
    }
}
