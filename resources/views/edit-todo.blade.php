@extends("master")
@section("title") Update To Do @endsection
@section("content")
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('todos.index')}}" class="btn btn-danger"> Back to To Dos </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form action="{{route('todos.update', $todo->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card shadow">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('success')}}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('failed')}}
                        </div>
                    @endif

                    <div class="card-header">
                        <h4 class="card-title"> Update To Do </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"> To Do </label>
                            <input type="text" name="title" class="form-control" id="title" value="{{old('title',$todo->title)}}">
                            {!!$errors->first("title", "<span class='text-danger'>:message </span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="todo_list_id"> To Do List </label>
                            <select class="form-control" name="todo_list_id">
                                <option value=''>Select To Do List</option>
                                @foreach ($todoLists as $key => $value)
                                @php 
                                    $id = ($todo->todoList && old('todo_list_id',$todo->todoList->id)) ? old('todo_list_id',$todo->todoList->id) : NULL;
                                @endphp
                                <option value="{{ $key }}" {{ ($key == $id) ? 'selected' : '' }}> 
                                    {{ $value }} 
                                </option>
                                @endforeach
                            </select>                        
                            {!!$errors->first("todo_list_id", "<span class='text-danger'>:message </span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="notes"> Notes </label>
                            <textarea class="form-control" name="notes" id="notes">@if(!empty($todo)){{$todo->notes}}@endif</textarea>
                            {!!$errors->first("notes", "<span class='text-danger'>:message </span>") !!}
                        </div>

                        <div class="form-group">
                            <label for="completed"> Complete </label>
                            <input type="checkbox" name="completed" id="completed" value="1" {{ $todo->completed ? 'checked' : '' }}">
                            {!!$errors->first("completed", "<span class='text-danger'>:message </span>")!!}
                        </div>                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
