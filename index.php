<?php
include 'database.php';
$obj=new Database();
// $obj->insert('students',['student_name'=>'Warisha','age'=>'8','city'=>'Lahore']);
// echo "insert result is:";
// $obj->update('students',['student_name'=>'shani','age'=>'10','city'=>'Lahore'],'id="5"');
// echo "update result is:";
// print_r($obj->getResult());
// $obj->delete('students','id="11"');
// echo "delete result is:";
// print_r($obj->getResult());
// $obj->sql('SELECT * FROM students');
// echo "SQL result is:";
// print_r($obj->getResult());
$obj->select('students','*',null,null,null,null);
echo "Select result is:";
print_r($obj->getResult());


?>