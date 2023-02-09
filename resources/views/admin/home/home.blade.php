@extends('admin.master')
@section('title')
    Test Dashboard
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    To-Do's List
                </div>
                <div class="card-body text-center">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>User Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                            @if(Session::get('userStatus') == 1)
                                @foreach($todos as $todo)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$todo->todo_title}}</td>
                                        <td>{{substr($todo->description,0,25)}}</td>
                                        <td>
                                            <img src="{{asset($todo->image)}}" alt="" class="img-fluid" width="100" height="100">
                                        </td>
                                        <td>{{$todo->UserName}}</td>
                                        <td class="d-flex mx-1">
                                            <a href="{{ route('edit.todo',['id'=>$todo->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif(Session::get('userStatus') == 0)
                                @foreach($usertodos as $todo)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$todo->todo_title}}</td>
                                        <td>{{substr($todo->description,0,25)}}</td>
                                        <td>
                                            <img src="{{asset($todo->image)}}" alt="" class="img-fluid" width="100" height="100">
                                        </td>
                                        <td>{{$todo->UserName}}</td>
                                        <td class="d-flex mx-1">
                                            <a href="{{ route('edit.todo',['id'=>$todo->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('delete.todo') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
