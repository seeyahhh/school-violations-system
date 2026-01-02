<?php

namespace Database\Factories;

use App\Models\Users;
use App\Models\ViolationRecord;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ViolationRecord>
 */
class ViolationRecordFactory extends Factory
{
    protected $model = ViolationRecord::class; 

    public function definition(): array
    {
        return [
            'user_id'      => Users::inRandomOrder()->first()->id ?? 1,
            'vio_sanct_id' => DB::table('violation_sanctions')->inRandomOrder()->value('id') ?? 1,
            'status_id'    => DB::table('status')->inRandomOrder()->value('id') ?? 1,
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }

}
