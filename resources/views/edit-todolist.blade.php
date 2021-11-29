@extends("master")
@section("title") Update To Do List @endsection
@section("content")
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('todolists.index')}}" class="btn btn-danger"> Back to To Do Lists </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form action="{{route('todolists.update', $todoList->id)}}" method="POST">
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
                        <h4 class="card-title"> Update To Do List</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Name </label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name', $todoList->name)}}">
                            {!!$errors->first("name", "<span class='text-danger'>:message </span>")!!}
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
