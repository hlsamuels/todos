<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TodoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords($this->faker->words(2, true)),
            'user_id' => User::firstWhere('role','user')->id
        ];
    }
}
