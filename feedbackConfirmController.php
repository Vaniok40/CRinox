<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$id = $_GET["id"];
$sql = "SELECT * from neconfirmate WHERE id = '$id'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);
$name = $result["nume"];
$email = $result["email"];
$comment = $result["comentariu"];
$date = $result["data_coment"];
$rate = $result["rate"];
$id_produs = $result["id_produs"];

$sql2 = "INSERT INTO confirmate (nume, email, comentariu, data_coment, rate, id_produs) VALUES('$name', '$email', '$comment', '$date', '$rate', '$id_produs');";
mysqli_query($connect, $sql2);

$sql3 = "DELETE FROM neconfirmate WHERE id = '$id'";
mysqli_query($connect, $sql3);
header("Location: feedbackConfirm.php");
ob_end_flush();