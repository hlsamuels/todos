<?php

namespace App\Policies;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TodoListPolicy
{
    use HandlesAuthorization;

    /**
     * Allow admin users to do whatever they want.
     *
     * @param \App\Models\User $user
     * @param string $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id
            ? Response::allow()
            : Response::deny('You are not the owner of this to-do list.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
       return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id
            ? Response::allow()
            : Response::deny('You are not the owner of this to-do list.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id
            ? Response::allow()
            : Response::deny('You are not the owner of this to-do list.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id
            ? Response::allow()
            : Response::deny('You are not the owner of this to-do list.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id
            ? Response::allow()
            : Response::deny('You are not the owner of this to-do list.');
    }
}
