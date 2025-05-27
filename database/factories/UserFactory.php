<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'), // default password
            'remember_token' => Str::random(10),
            'is_admin' => false,
            'verjaardag' => $this->faker->date(),
            'over_mij' => $this->faker->sentence(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'email_verified_at' => now(),
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
            'verjaardag' => '2005-02-21',
            'over_mij' => 'Ik ben de administrator van de site.',
            'remember_token' => Str::random(10),
        ]);
    }
}
