<?php
echo $stu_id=$_POST['sid'];
echo $stu_name=$_POST['sname'];
echo $stu_adress=$_POST['saddress'];
echo $stu_class=$_POST['sclass'];
echo $stu_phone=$_POST['sphone'];

$conn=mysqli_connect("localhost","root","","crud") or die("connection failed");

$query="UPDATE student SET sname='{$stu_name}',sadress='{$stu_adress}',sclass='{$stu_class}',sphone='{$stu_phone}' WHERE sid={$stu_id}";
$result=mysqli_query($conn,$query) or die("query unsuccessful");

header("Location: http://localhost/crud/index.php");

mysqli_close($conn);

?>