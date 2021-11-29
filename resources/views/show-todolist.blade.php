@extends("master")
@section("title") Show To Do List @endsection
@section("content")
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('todolists.index')}}" class="btn btn-danger"> Back to To Do Lists </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title"> View To Do List </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" readonly name="name" class="form-control" id="name" value=" {{$todoList->name}} ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
