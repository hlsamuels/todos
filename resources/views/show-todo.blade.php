@extends("master")
@section("title") Show To Do @endsection
@section("content")
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('todos.index')}}" class="btn btn-danger"> Back to To Dos </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title"> View To Do </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title"> To Do </label>
                        <input type="text" readonly name="title" class="form-control" id="title" value=" {{$todo->title}} ">
                    </div>

                    <div class="form-group">
                        <label for="title"> List </label>
                        <input type="text" readonly name="todo_list" class="form-control" id="todo_list" value=" {{$todo->todoList->name}} ">
                    </div>

                    <div class="form-group">
                        <label for="description"> Notes </label>
                        <textarea class="form-control" readonly name="notes" id="notes"> {{$todo->notes}} </textarea>
                    </div>

                    <div class="form-group">
                        <label for="completed"> Completed</label>
                        <input type="text" readonly name="completed" class="form-control" id="completed" value="@if($todo->completed) Yes @else No @endif">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
