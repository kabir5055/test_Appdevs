@extends('admin.master')
@section('title')
    Manage User
@endsection
@section('content')

    <main>
        <div class="container-fluid px-4 mt-2">

            <div class="card mb-4">
                <div class="card-body">
                    <a class="btn btn-success" href="{{route('todo')}}">Add Todo</a>
                    <h4>{{session('message')}}</h4>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Manage User
                </div>
                <div class="card-body text-center">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>

                                <td class="d-flex mx-1">
                                    <a href="" class="btn btn-primary btn-sm mx-1">Edit</a>
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection



