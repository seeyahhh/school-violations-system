<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            'last_name'  => $this->faker->unique()->lastName,
            'school_id'  => "{$year}-{$randomDigits}-MN-0",
            'email'      => $this->faker->unique()->safeEmail(),
            'password'   => Hash::make('secret'),
            'role_id'    => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function student()
    {
        return $this->state(fn(array $attributes) => [
            'email'   => strtolower($attributes['last_name']) . '@iskolarngbayan.pup.edu.ph',
            'role_id' => 1,
        ]);
    }

    public function faculty()
    {
        return $this->state(fn(array $attributes) => [
            'email'   => strtolower($attributes['last_name']) . '@pup.edu.ph',
            'role_id' => 2,
        ]);
    }
}
