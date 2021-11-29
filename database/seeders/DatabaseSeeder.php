<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => 'admin@domain.com',
            'password' => Hash::make('password'),
            'name' => 'Administrator',
            'role' => 'admin'
        ]);

        $user1 = \App\Models\User::factory()->create([
            'email' => 'user1@domain.com',
            'password' => Hash::make('password'),
            'name' => 'User 1',
            'role' => 'user'
        ]);

        $user2 = \App\Models\User::factory()->create([
            'email' => 'user2@domain.com',
            'password' => Hash::make('password'),
            'name' => 'User 2',
            'role' => 'user'
        ]);

        $todoList1 = \App\Models\TodoList::factory()->create(['user_id' => $user1->id]);
        $todoList2 = \App\Models\TodoList::factory()->create(['user_id' => $user2->id]);
        
        \App\Models\Todo::factory()->create([
            'user_id' => $user1->id,
            'todo_list_id' => $todoList1->id]
        );
        
        \App\Models\Todo::factory()->create([
            'user_id' => $user1->id,
            'todo_list_id' => $todoList1->id]
        );
        
        \App\Models\Todo::factory()->create([
            'user_id' => $user1->id,
            'todo_list_id' => $todoList1->id]
        );       
        
        \App\Models\Todo::factory()->create([
            'user_id' => $user1->id,
            'todo_list_id' => $todoList1->id]
        );

        \App\Models\Todo::factory()->create([
            'user_id' => $user2->id,
            'todo_list_id' => $todoList2->id]
        );
        
        \App\Models\Todo::factory()->create([
            'user_id' => $user2->id,
            'todo_list_id' => $todoList2->id]
        );
        
        \App\Models\Todo::factory()->create([
            'user_id' => $user2->id,
            'todo_list_id' => $todoList2->id]
        );       
        
        \App\Models\Todo::factory()->create([
            'user_id' => $user2->id,
            'todo_list_id' => $todoList2->id]
        );
    }
}
