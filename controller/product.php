<?php

$conn = include("./connection.php");

include("../model/productModel.php");
include("../model/userModel.php");

$desc = $_POST["desc"];
$price = $_POST["price"];

$email_user = $_POST["email_user"];
$num= $_POST["num"];
$id= $_POST["id"];
$decsr= $_POST['decsr'];

if ($conn) {
 
    $userObj = new User($conn);
    $data = $userObj->getData($email_user);
    $productObj = new Product($conn);
    foreach ($data as $key => $val) {
        if ($key == "access" && $val == "admin") {
            switch($num){
                case "insert":
                    $productObj->insert($desc, $price);
                    return;
                case "delete":
                    $productObj->delete($id);
                    return;
                case "update":
                    $productObj->update($id,$decsr);
                    return;

            }
        }
    }
    echo "<br>User not Admin. You Can view Data<br>";
    $res = $productObj->getData();
    while ($dataP = mysqli_fetch_assoc($res)) {
        foreach ($dataP as $key => $val) {
            echo '<br>';
            echo $key . '=>' . $val;
        }
    }

}

?>