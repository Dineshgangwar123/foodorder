<?php

//for localhost
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "food_order";

//for remote
$servername = "remotemysql.com";
$username = "BZ4EosJhY0";
$password = "bC6c8rJ081";
$dbname = "BZ4EosJhY0";

$link = mysqli_connect($servername, $username, $password,$dbname);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>