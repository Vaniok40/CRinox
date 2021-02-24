<?php 
$servername = "localhost:3306";
$username = "crinox_admin";
$password = "j7%3G9uj";
$db = "crinoxsh";

$connect = mysqli_connect($servername, $username, $password) or die("Could not connect");
mysqli_select_db($connect, $db) or die("Could not select database");
?>