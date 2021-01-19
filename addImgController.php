<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$id = $_POST["id"];
$filename = $_FILES["file"]["name"];
$sql2 = "SELECT * FROM produse WHERE id = '$id'";
$query2 = mysqli_query($connect, $sql2);
$result = mysqli_fetch_array($query2);
$photoarr = explode(",", $result["poza"]);
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION );
$basename = $id . "_" . time() . "." .  $extension; 
array_push($photoarr, $basename);
$stringFromArray = join(",", $photoarr);
move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $basename);

$sql = "UPDATE produse SET poza = '$stringFromArray' WHERE id = '$id'";
mysqli_query($connect, $sql);
header("Location: addNewImg.php?id=$id");
ob_end_flush();
?>