<?php
// params to connect to a database
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="emp";

// connnection to database
$conn=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName); 

if(!$conn){
    die("Database Connection failed!");
}

?>