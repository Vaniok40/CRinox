<?php 
// $servername = "localhost";
// $username = "id15756816_root";
// $password = "M}FdM$7UF~wyPY2q";
// $db = "id15756816_crinox";

$servername = "localhost";
$username = "root";
$password = "";
$db = "crinox";

$connect = mysqli_connect($servername, $username, $password) or die("Could not connect");
mysqli_select_db($connect, $db) or die("Could not select database");
?>