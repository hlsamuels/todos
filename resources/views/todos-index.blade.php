@extends("master")

@section("title") To Dos @endsection
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

    @if(!Auth::user()->isAdmin())
    <div class="col-xl-6 text-right">
        <a href="{{route('todos.create')}}" class="btn btn-success "> Add New </a>
    </div>
    @endif    
</div>

<table class="table table-striped">
    <thead>
        <th> To Do </th>
        <th> List </th>
        <th> Notes </th>
        <th> Completed </th>
        <th> Action </th>
    </thead>

    <tbody>

        @if(count($data) > 0)
            @foreach($data as $todo)
                <tr>
                    <td> 
                        @if($todo->deleted_at)
                        <span style="color:red !important;">{{$todo->title}}</span>
                        @else
                        {{$todo->title}}
                        @endif                        
                        
                    </td>
                    <td>
                        @if($todo->todoList)
                        {{$todo->todoList->name}}
                        @endif
                    </td>
                    <td> {{$todo->notes}} </td>
                    <td>
                        @if($todo->completed)
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td>
                        <form action="{{route('todos.destroy', $todo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('todos.show', $todo->id)}}" class="btn btn-sm btn-info"> View </a>
                            <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-sm btn-success"> Edit </a>

                            <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
