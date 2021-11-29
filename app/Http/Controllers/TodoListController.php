<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Http\Requests\StoreTodoListRequest;
use App\Http\Requests\UpdateTodoListRequest;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(TodoList::class, 'todolist');
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
            $todoLists = TodoList::all();
        } else {
            $todoLists = $user->todoLists()->get();
        }
        return view('todolists-index', ['data' => $todoLists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-todolist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoListRequest $request)
    {
        $values = $request->all();
        $values['user_id'] = $request->user()->id;
        $todoList = TodoList::create($values);
        if(!is_null($todoList)) {
            return back()->with("success", "Success! To Do List created");
        }
        else {
            return back()->with("failed", "Alert! To Do List not created");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TodoList $todolist)
    {
        return view('show-todolist', ['todoList' => $todolist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoList $todolist)
    {
        return view('edit-todolist', ['todoList' => $todolist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoListRequest  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoListRequest $request, TodoList $todolist)
    {
        $todoList = $todolist->update($request->all());
        if(!is_null($todoList)) {
            return back()->with("success", "Success! To Do List updated");
        }
        else {
            return back()->with("failed", "Alert! To Do List not updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList)
    {
        $todoList = $todoList->delete();
        return back()->with("success", "To Do List deleted");
    }
}
