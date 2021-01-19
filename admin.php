<?php 
    require 'connect.php';
?>
<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/admin.css">
<div class="container">
    <div class="title">Logheaz&#259;-te pe CRinox Shine</div>
    <div class="data">Introduce&#355;i datele de logare mai jos</div>
    <form action="adminController.php" method="POST">
        <div class="error">
            <?php
    if(isset($_GET["errmsg"]) && $_GET["errmsg"] == 0){
        echo "Datele sunt incorecte";
    }
    ?>
        </div>
        <div class="log-in-data email-label">email</div>
        <input type="email" name="email" require placeholder="Email">
        <div class="log-in-data email-label">parola</div>
        <input type="password" name="password" require placeholder="Parola">
        <input type="submit" name="submit" value="Logheaz&#259;-te">
    </form>
</div>