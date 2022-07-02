<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "comment" => $this->faker->sentence,
            "post_id" => Post::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
