<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$id = $_GET["id"];
$sql = "DELETE FROM neconfirmate WHERE id = '$id'";
mysqli_query($connect, $sql);
header("Location: feedbackConfirm.php");
ob_end_flush();