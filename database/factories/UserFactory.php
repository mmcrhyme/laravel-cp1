<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            // sail artisan db:seed --class=〇〇sSeeder で一部テーブルのダミーデータのみ作成可能
            'name' => $this->faker->name(),
            'email'=> $this->faker->email(),
            'password'=>$this->faker->password($minLength = 6, $maxLength = 20),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id'=>$this->faker->userName(15),
            'fname' => Str::random(25),
            'bio' => $this->faker->realText(100),
            'admin' => $this->faker->numberBetween(0,1),
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
