<?php
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="emp"; 

$conn=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName); 

if(!$conn){
    die("Database Connection failed!");
}

?>