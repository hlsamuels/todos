@extends("master")

@section("title") To Do Lists @endsection
@section("content")

<div class="row mb-4">
    <div class="col-xl-6">
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
    </div>
    <div class="col-xl-6 text-right">
        <a href="{{route('todolists.create')}}" class="btn btn-success "> Add New </a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <th> List Name</th>
        <th> To Do's </th>
        <th> Action </th>
    </thead>

    <tbody>

        @if(count($data) > 0)
            @foreach($data as $todoList)
                <tr>
                    <td> {{$todoList->name}} </td>
                    <td> {{$todoList->todos()->withTrashed()->count()}} </td>
                    <td>
                        <form action="{{route('todolists.destroy', $todoList->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('todolists.show', $todoList->id)}}" class="btn btn-sm btn-info"> View </a>
                            <a href="{{route('todolists.edit', $todoList->id)}}" class="btn btn-sm btn-success"> Edit </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
