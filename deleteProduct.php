<?php 
    require 'connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM produse WHERE id = '$id'";
    mysqli_query($connect,$sql);
    header("Location: adminCatalog.php");
?>