<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>User Login</h1>
<div class="m-4">
<form action="{{url('/user/store')}}" method="POST">
   @csrf

        <div class="mb-3">
            <label class="form-label" for="inputTitle">name</label>
            <input type="text" class="form-control" name="username" placeholder="Enter username" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="inputId">role</label>
            <select name="enter_role"  class="form-control" required>
                 <option value="">select role</option>
                 <option value="0">Admin</option>
                 <option value="1">User</option>
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