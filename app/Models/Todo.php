<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the user that owns the todo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the todoList that the todo belongs to.
     */
    public function todoList()
    {
        return $this->belongsTo(TodoList::class);
    }
}
