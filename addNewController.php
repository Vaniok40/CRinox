<?php 
ob_start();
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
require 'connect.php';
$denumire = $_POST["title"];
$pret = $_POST["price"];
$descriere = $_POST["description"];
$categorie = $_POST["category"];
$sql = "INSERT INTO produse (denumire, pret, descriere, categorie) VALUES('$denumire', '$pret', '$descriere', '$categorie')";
mysqli_query($connect, $sql);
$sql2 = "SELECT id FROM produse ORDER BY id DESC LIMIT 1";
$new = mysqli_query($connect, $sql2);
$result = mysqli_fetch_array($new);
$id = $result['id'];
header("Location: addNewImg.php?id=$id");
ob_end_flush();
?>