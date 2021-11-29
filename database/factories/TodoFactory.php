<?php

namespace Database\Factories;

use App\Models\TodoList;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::firstWhere('role','user')->id,
            'todo_list_id' => TodoList::first()->id,
            'title' => ucwords($this->faker->words(2, true)),
            'notes' => $this->faker->sentence(),
        ];
    }
}
