<!DOCTYPE html>
<html>
<head>
    <title>User Basic Table</title>
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  

    <style>
        .container{
            text-align:center;
            color:green;  
        }
    </style>
</head>
  
<body>
    <div class="container">

      <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Website</a>
    <button class="navbar-toggler" type="button" data-coreui-toggle="collapse" data-coreui-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/post/index')}}">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/category/index')}}">Category</a>
        </li>
    </div>
  </div>
</nav>
        <h1>First table in laravel</h1><br>
        <a href="{{url('/user/create')}}" class="btn btn-success">Create</a>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th scope="col">S. No.</td>
                    <th scope="col">username</td>
                    <th scope="col">role</td>
                    <th scope="col">Actions</td>
                </tr>
            </thead>
            <tbody>
                @php  $i=1  @endphp
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$i}}</td>
                    <td>{{$user->name}}</td>
                    <td>@if($user->role==0) {{'Admin'}} @else {{'normal user'}}  @endif</td>
                    <td>
                        <a href="{{url('/user')}}/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                        <a href="{{url('/user')}}/{{$user->id}}/show" class="btn btn-success">Show</a>
                    </td>
                </tr>
                @php $i++  @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</body>
  
</html>