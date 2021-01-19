<?php
ob_start();
session_start();
require 'connect.php';
$timeout = 60*60*24;
if(!isset($_SESSION['mail']) || isset($_SESSION["count"])){
    $_SESSION['mail'] = time() + $timeout; 
    if(!isset($_SESSION['count'])){
        $_SESSION['count'] = 0;
        $name = $_POST["name"];
        $email = $_POST["email"];
        $msg = $_POST["message"];
        $tel = $_POST["tel"];
        $sql = "INSERT INTO contact (nume, email, mesaj, telefon) VALUES ('$name', '$email', '$msg', '$tel')";
        mysqli_query($connect, $sql);
        $_SESSION["count"]++;
    }
    elseif($_SESSION['count'] < 2){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $msg = $_POST["message"];
        $tel = $_POST["tel"];
        $sql = "INSERT INTO contact (nume, email, mesaj, telefon) VALUES ('$name', '$email', '$msg', '$tel')";
        mysqli_query($connect, $sql);
        $_SESSION["count"]++;
    }   
}

$life = time() - $_SESSION['mail']; 

if($life > $timeout){
    session_unset($_SESSION["mail"], $_SESSION["count"]);
}
$_SESSION['mail']=time();
header("Location: index.php#contact");
ob_end_flush();
?>