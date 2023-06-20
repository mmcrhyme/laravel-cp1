<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //Tweetのダミーデータを生成
            'user_id'=>$this->faker->randomNumber(),
            'user_name' => $this->faker->name(),
            'fname' => Str::random(25),
            'title' => $this->faker->realText(15),
            'problem' => $this->faker->realText(100),
            'solution' => $this->faker->realText(100),
            'impression' => $this->faker->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
