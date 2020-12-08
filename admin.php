<?php 
    require 'connect.php';
?>
<title>CRinox</title>
<link rel="stylesheet" href="css/admin.css">
<div class="alert">Accesarea panelului de administrator se efectueaza doar de pe versiunea desktop</div>
<div class="container">
    <div class="title">Logheaz&#259;-te pe CRinox Shine</div>
    <div class="data">Introduce&#355;i datele de logare mai jos</div>
    <form action="adminController.php" method="POST">
    <div class="log-in-data email-label">email</div>
    <input type="email" name="email" require placeholder="Email">
    <div class="log-in-data email-label">parola</div>
    <input type="password" name="password" require placeholder="Parola">
    <input type="submit" name="submit" value="Logheaz&#259;-te">
    </form>
</div>
 