<?php

namespace Database\Seeders;

use App\Models\ViolationRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViolationRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ViolationRecord::factory()->count(50)->create();
    }
}
