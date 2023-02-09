<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">

<div class="container-fluid px-4">
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
            </tr>
            </thead>
            <tbody>
            @php $i=1 @endphp
                @foreach($todos as $todo)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$todo->todo_title}}</td>
                        <td>{{substr($todo->description,0,25)}}</td>
                        <td>
                            <img src="{{asset($todo->image)}}" alt="" class="img-fluid" width="100" height="100">
                        </td>
                        <td>{{$todo->UserName}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-12 d-flex border text-center mt-5 mb-5 p-5">
        <div class="col-md-6">
            <h1>Register</h1>

            <a type="button" href="{{ route('user.resister') }}" class="btn btn-primary">User</a>
            <a type="button" href="{{ route('admin.user.resister') }}"  class="btn btn-success">Admin</a>
        </div>
        <div class="col-md-6">
            <h1>Log In</h1>

            <a type="button" href="{{ route('user.login') }}" class="btn btn-primary">User</a>
            <a type="button" href="{{ route('admin.user.login') }}"  class="btn btn-success">Admin</a>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('adminAsset') }}/assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('adminAsset') }}/assets/js/chart-area-demo.js"></script>
<script src="{{ asset('adminAsset') }}/assets/js/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('adminAsset') }}/assets/js/datatables-simple-demo.js"></script>
</body>
</html>


