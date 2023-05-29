<?php
include("../model/connectModel.php");

function establishConnection($db, $host, $user, $pass)
{
    $connObj = new Connection($db, $user, $host, $pass);
    $conn = $connObj->makeConnection();

    return $conn;
}

$db = $_POST["db"] ?? "";
$host = $_POST["host"] ?? "";
$user = $_POST["user"] ?? "";
$pass = "";

$conn = establishConnection($db, $host, $user, $pass);

return $conn;

?>