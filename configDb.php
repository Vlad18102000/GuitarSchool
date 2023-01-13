<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = "";
$db_name = "guitarschool";

$con = new mysqli($db_host,$db_user,$db_password,$db_name);

if($con->connect_error){
   die("Failed connection");
}
?>