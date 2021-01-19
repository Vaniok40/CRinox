<?php
ob_start();
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
require 'connect.php';

$id = $_GET["id"];
$id_produs = $_GET["product"];
$sql = "DELETE FROM confirmate WHERE id = '$id'";
mysqli_query($connect, $sql);
header("Location: editProduct.php?id=$id_produs");
ob_end_flush();
?>