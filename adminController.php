<?php
ob_start();
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
require 'connect.php';
$login = $_POST["email"];
$password = $_POST["password"];
$password = md5($password);
$sql = "SELECT * FROM logare WHERE email='$login' AND parola='$password'";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
if($count == 1){
    session_start();
    $_SESSION['admin'] = 1;
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                header("Location: adminCatalog.php");
            }  
}
else{
    header("Location: admin.php?errmsg=0");
}
ob_end_flush();
?>