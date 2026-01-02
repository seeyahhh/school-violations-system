<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = $this->faker->numberBetween(2015, 2026);
        $randomDigits = str_pad($this->faker->numberBetween(1, 99999), 5, '0', STR_PAD_LEFT);

        return [
            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'school_id'  => "{$year}-{$randomDigits}-MN-0", 
            'email'      => $this->faker->unique()->safeEmail,
            'password'   => Hash::make('secret'),
            'role_id'    => DB::table('roles')->inRandomOrder()->value('id'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
