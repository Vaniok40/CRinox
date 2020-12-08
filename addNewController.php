<?php 
    require 'connect.php';
    $denumire = $_POST["title"];
    $poza = "Lucrare1.png";
    $pret = $_POST["price"];
    $descriere = $_POST["description"];
    $categorie = $_POST["category"];
    $sql = "INSERT INTO produse (denumire, pret, descriere, poza, categorie) VALUES('$denumire', '$pret', '$descriere', '$poza', '$categorie')";
    mysqli_query($connect, $sql);
    header("Location: adminCatalog.php");
?>