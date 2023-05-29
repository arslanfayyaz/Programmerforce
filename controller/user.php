<?php

$conn = require("./connection.php");

include("../model/userModel.php");

$email = $_POST["email"];
$access = $_POST["access"];

if ($conn) {
    $userObj = new User($conn);
    $userObj->insert($email, $access);
}

?>