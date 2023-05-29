<?php

$conn = include("./connection.php");

include("../model/categoryModel.php");
include("../model/userModel.php");

$name = $_POST["name"];

$email_user = $_POST["email_user"];
$num= $_POST["num"];
$id= $_POST["id"];
$decsr= $_POST['decsr'];

if ($conn) {
 
    $userObj = new User($conn);
    $data = $userObj->getData($email_user);
    $categoryObj = new category($conn);
    foreach ($data as $key => $val) {
        if ($key == "access" && $val == "admin") {
            switch($num){
                case "insert":
                    $categoryObj->insert($name);
                    return;
                case "delete":
                    $categoryObj->delete($id);
                    return;
                case "update":
                    $categoryObj->update($id,$decsr);
                    return;

            }
        }
    }
    echo "<br>User not Admin. You Can view Data<br>";
    $res = $categoryObj->getData();
    while ($dataP = mysqli_fetch_assoc($res)) {
        foreach ($dataP as $key => $val) {
            echo '<br>';
            echo $key . '=>' . $val;
        }
    }

}

?>