<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>Edit Category</h1>
<div class="m-4">
<form action="{{url('/user')}}/{{$user->id}}/update" method="POST">
  @method('PUT') 
   @csrf
        <div class="mb-3">
            <label class="form-label" for="inputTitle">name</label>
            <input type="text" class="form-control" name="username" value="{{$user->name}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="inputId">role</label>
            <select name="enter_role"  class="form-control" required>
                 <option value="0"@if($user->role==0){{'selected'}} @endif >Admin</option>
                 <option value="1" @if($user->role==1){{'selected'}} @endif >User</option>
            </select>
        </div>
        <!-- <select name="status" id="stat">
        <option value="0">false</option>
        <option value="1">True</option>
        </select>
 -->
        <button type="submit">Submit</button>


</form>
</div>
</html>