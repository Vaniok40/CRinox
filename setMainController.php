<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}

$id = $_POST["id"];
$index = $_POST["index"] + 1;
$sql = "SELECT poza FROM produse WHERE id = '$id'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);
$arr = explode(',', $result["poza"]);
$aux = $arr[1];
$arr[1] = $arr[$index];
$arr[$index] = $aux;
$stringFromArray = join(",", $arr);

$sql2 = "UPDATE produse SET poza = '$stringFromArray' WHERE id = '$id'";
mysqli_query($connect, $sql2);
header("Location: addNewImg.php?id=$id");
ob_end_flush();
?>