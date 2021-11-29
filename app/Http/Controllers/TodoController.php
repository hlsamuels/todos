<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoList;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Todo::class, 'todo');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->isAdmin()) {
            $todos = Todo::withTrashed()->get();
        } else {
            $todos = $user->todos()->get();
        }
        return view('todos-index', ['data' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $todoLists = TodoList::where('user_id',$request->user()->id)->pluck('name', 'id');
        return view('create-todo', [
            'todoLists' => $todoLists
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        $values = $request->all();
        $values['user_id'] = $request->user()->id;
        $todo = Todo::create($values);
        if(!is_null($todo)) {
            return back()->with("success", "Success! To Do created");
        }

        else {
            return back()->with("failed", "Alert! To Do not created");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Todo $todo)
    {
        return view('show-todo', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Todo $todo)
    {
        $todoLists = TodoList::where('user_id',$request->user()->id)->pluck('name', 'id');
        return view('edit-todo', [
            'todo' => $todo,
            'todoLists' => $todoLists
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo = $todo->update($request->all());
        if(!is_null($todo)) {
            return back()->with("success", "Success! To Do updated");
        }
        else {
            return back()->with("failed", "Alert! To Do not updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo = $todo->delete();
        return back()->with("success", "To Do deleted");
    }
}
