@extends("master")
@section("title") Create To Do @endsection
@section("content")

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('todos.index')}}" class="btn btn-danger"> Back to To Do's </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <form action="{{route('todos.store')}}" method="POST">
                @csrf
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
                        <h4 class="card-title"> Create To Do </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"> To Do </label>
                            <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                            {!!$errors->first("title", "<span class='text-danger'>:message </span>")!!}
                        </div>
                        <div class="form-group">
                            <label for="todo_list_id"> List</label>
                            <select class="form-control" name="todo_list_id">
                                <option value=''>Select To Do List</option>
                                @foreach ($todoLists as $key => $value)
                                <option value="{{ $key }}" 
                                @if ( old('todo_list_id') === $key )
                                'selected'
                                @endif
                                > 
                                {{ $value }} 
                                </option>
                                @endforeach
                            </select>                        

                        </div>
                        <div class="form-group">
                            <label for="notes"> Notes </label>
                            <textarea class="form-control" name="notes" id="notes">{{old('notes')}}</textarea>
                            {!!$errors->first("notes", "<span class='text-danger'>:message </span>") !!}
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
