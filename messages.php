<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$sql = "SELECT * from contact";
$query = mysqli_query($connect, $sql);
?>
<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/feedbackConfirm.css">
<div class="container">
    <a href="adminCatalog.php" class="back"><img src="img/arrow-left.svg" alt="back">&nbsp;&#206;napoi</a>
    <div class="columns2">
        <div>Numele utilizatorului</div>
        <div>E-mail</div>
        <div>Mesaj</div>
        <div>Telefon</div>
        <div>Optiuni</div>
    </div>
    <div class="comments">
        <?php 
            foreach ($query as $item):
        ?>
        <div class="comment2">
            <div>
                <div class="username"><?=$item["nume"]?></div>
            </div>
            <div>
                <div class="username"><?=$item["email"]?></div>
            </div>
            <div>
                <?=$item["mesaj"]?>
            </div>
            <div>
                <?=$item["telefon"]?>
            </div>
            <div>
                <a class="x" href="messageDelete.php?id=<?=$item["id"]?>"><img src="img/x-black.svg" alt="x"></a>
            </div>
        </div>
        <?php endforeach; ?>
        <div onclick="increment()" class="load-more-btn">
            <button class="check-more">Vezi mai multe</button>
        </div>
    </div>
</div>
<script src="js/unconfirmed.js"></script>
<?php
ob_end_flush();
?>