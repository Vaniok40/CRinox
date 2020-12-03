<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "crinox";

$connect = mysqli_connect($servername, $username, $password) or die("Could not connect");
mysqli_select_db($connect, $db) or die("Could not select database");
?>


