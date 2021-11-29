<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the todos for the todoList.
     */
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    /**
     * Get the user that owns the todo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
