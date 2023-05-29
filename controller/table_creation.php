<?php
include("../model/creationModel.php");
$conn = include("./connection.php");

$createObj = new Creation();
if ($conn) {
    $createObj->migration($conn);
    }
 else {
    echo 'Connection not established';
}

?>