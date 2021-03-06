<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->text($maxNbChars = 30),
            "body" => $this->faker->text($maxNbChars = 1000),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
