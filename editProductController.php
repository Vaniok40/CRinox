<?php 
    require 'connect.php';
    $id = $_GET['id'];
    $denumire = $_POST["title"];
    $poza = "Lucrare1.png";
    $pret = $_POST["price"];
    $descriere = $_POST["description"];
    $categorie = $_POST["category"];
    $sql = "UPDATE produse SET denumire = '$denumire', pret = '$pret', descriere = '$descriere', poza = '$poza', categorie = '$categorie' WHERE id = '$id'";
    mysqli_query($connect, $sql);
    // header("Location: adminCatalog.php");
?>