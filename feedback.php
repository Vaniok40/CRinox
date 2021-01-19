<?php
session_start();
require 'connect.php';
$inactive = 60*60*24;
if(!isset($_SESSION['feedback']) || empty($_SESSION['feedback'])){
    $_SESSION['feedback'] = time() + $inactive;
    $id = $_POST["id"];
    $name = $_POST["nume"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];
    $date = date("Y-m-d");
    $rate = $_POST["rate"]+1;
    $sql = "INSERT INTO neconfirmate (nume, email, comentariu, data_coment, rate, id_produs) VALUES('$name', '$email', '$comment', '$date', '$rate', '$id');";
    mysqli_query($connect, $sql);
}

$session_life = time() - $_SESSION['feedback'];

if($session_life > $inactive){ 
    session_unset($_SESSION['feedback']);
}
$_SESSION['feedback']=time();
?>