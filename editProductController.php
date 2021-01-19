<?php 
ob_start();
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
    require 'connect.php';
    $id = $_GET['id'];
    $denumire = $_POST["title"];
    $pret = $_POST["price"];
    $descriere = $_POST["description"];
    $categorie = $_POST["category"];
    $sql = "UPDATE produse SET denumire = '$denumire', pret = '$pret', descriere = '$descriere', categorie = '$categorie' WHERE id = '$id'";
    mysqli_query($connect, $sql);
    header("Location: editImg.php?id=$id");
    ob_end_flush();
?>