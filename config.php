<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

$link = mysqli_connect($servername, $username, $password,$dbname);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>