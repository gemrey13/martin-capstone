<?php

$host="localhost";
$user="root";
$pass="";
$db="capstone";
$conn = new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to coonnect DB".$conn->connect_error;
}
?>


