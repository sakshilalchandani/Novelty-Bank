<?php

// connecting to database
$server = "localhost";
$username = "root";
$pass = "";
$database = "sparks_bank";

$con = mysqli_connect($server,$username,$pass,$database);

if(!$con){
    die("connection failed due to error: ". $con->connect_error);
}

?>