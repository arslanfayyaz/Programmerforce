<?php

$conn = include("./connection.php");

include("../model/orderModel.php");
include("../model/userModel.php");

$name = $_POST["name"];
$user_id = $_POST["user_id"];
$product_id=$_POST["product_id"];
$email_user = $_POST["email_user"];
$num= $_POST["num"];
$id= $_POST["id"];
$decsr= $_POST['decsr'];

if ($conn) {
 
    $userObj = new User($conn);
    $data = $userObj->getData($email_user);
    $orderObj = new Order($conn);
    foreach ($data as $key => $val) {
        if ($key == "access" && $val == "admin") {
            switch($num){
                case "insert":
                    $orderObj->insert($name,$user_id,$product_id);
                    return;
                case "delete":
                    $orderObj->delete($id);
                    return;
                case "update":
                    $orderObj->update($id,$decsr);
                    return;

            }
        }
    }
    echo "<br>User not Admin. You Can view Data<br>";
    $res = $orderObj->getData();
    while ($dataP = mysqli_fetch_assoc($res)) {
        foreach ($dataP as $key => $val) {
            echo '<br>';
            echo $key . '=>' . $val;
        }
    }

}

?>