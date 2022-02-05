<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),

            // 'user_id' => function () {
            //     return User::factory()->create()-id;
            // }
            'is_open' => $this->faker->randomElement([true,true,true,true,false]),
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(100),
            'updated_at' => $this->faker->dateTimeBetween('-10days', '0days'),
        ];
    }
}
