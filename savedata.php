<?php

echo $stu_name=$_POST['sname'];
echo $stu_adress=$_POST['saddress'];
echo $stu_class=$_POST['class'];
echo $stu_phone=$_POST['sphone'];

$conn=mysqli_connect("localhost","root","","crud") or die("connection failed");

$query="INSERT INTO student(sname,sadress,sclass,sphone) VALUES('{$stu_name}','{$stu_adress}','{$stu_class}','{$stu_phone}')";
$result=mysqli_query($conn,$query) or die("query unsuccessful");

header("Location: http://localhost/crud/index.php");

mysqli_close($conn);


?>