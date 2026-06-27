<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => null, // আপনার যদি আলাদা roles টেবিল থাকে, তবে এখানে fake()->numberBetween(1, 5) দিতে পারেন
            'name' => fake()->name(),
            'designation' => fake()->jobTitle(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            
            // আপনার ডাটাবেসের enum অনুযায়ী র‍্যান্ডম রোল তৈরি করবে
            'role' => fake()->randomElement(['admin', 'staff', 'customer']), 
            
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'status' => fake()->randomElement(['active', 'suspended']),
            
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}