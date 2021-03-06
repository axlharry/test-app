<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'post_id' => Post::factory(),
            'post_id' => Post::inRandomOrder()->first()->id,
            //'user_id' => User::factory(),
            'user_id' => User::inRandomOrder()->first()->id,
            'body' => $this->faker->paragraph

        ];
    }
}
