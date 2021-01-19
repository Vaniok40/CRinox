<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$id = $_GET['id'];
$sql2 = "SELECT * FROM produse WHERE id = '$id'";
$query = mysqli_query($connect, $sql2);
$result = mysqli_fetch_array($query);
$arr = explode(",", $result["poza"]);
for($i=1; $i < count($arr); $i++){
    unlink("uploads/" . $arr[$i]);
}
$sql = "DELETE FROM produse WHERE id = '$id'";
mysqli_query($connect,$sql);

$sql3 = "DELETE FROM confirmate WHERE id_produs = '$id'";
mysqli_query($connect,$sql3);
header("Location: adminCatalog.php");
ob_end_flush();
?>