<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php 
include "database.php";
$serverErr=$userErr=$passErr=$dbErr="";
$sname=$username=$password=$database="";

if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['myButton'])) {
     
  if(empty($_POST['servername']))
  {
    $serverErr="Server name is required";
  }
  else
  {
    $sname=$_POST['servername'];
  }
  if(empty($_POST['username']))
  {
    $userErr="Username is required";
  } 
  else
  {
    $username=$_POST['username'];
  }
  if(empty($_POST['password']))
  {
    $passErr="Password is required";
  }
  else
  {
    $password=$_POST['password'];
  }
  if(empty($_POST['database']))
  {
    $dbErr="database name is required";
  }
  else
  {
    $database=$_POST['database'];
  }
}


if (!empty($sname) && !empty($username) && !empty($database)){
  $obj=new migration($sname,$username,$password,$database);
  $obj->checkConnection();
  $obj->createMigrations();

}else{
    echo 'Please fill in all fields before submitting.';
}
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ServerName: <input type="text" name="servername" value="<?php echo $sname;?>">
  <span class="error">* <?php echo $serverErr;?></span>
  <br><br>
  UserName: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $userErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  DatabaseName: <input type="text" name="database" value="<?php echo $database;?>">
  <span class="error">* <?php echo $dbErr;?></span>
  <br><br>
  <button type="submit" name="myButton">Click Me</button>
</form>

</body>
</html>