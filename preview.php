<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$id = $_GET["id"];
$sql = "SELECT * FROM produse WHERE id = '$id'";
$query = mysqli_query($connect,$sql);
$result = mysqli_fetch_array($query);
$arr = explode(",",$result['poza']);
?>
<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<section class="product">
    <div class="container">
        <a href="javascript:history.back()" class="back">
            <img src="img/arrow-left.svg" alt="arrow">&nbsp;&#206;napoi
        </a>
        <div class="product-grid">
            <div>
                <img class="product-image"
                    src="uploads/<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
                    alt="<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
                    title="Crinox-Shine | <?=ucfirst($result["denumire"])?>">
                <div class="additive-images">
                    <?php for($i = 1; $i <= 4; $i++): 
                                if(isset($arr[$i])):
                        ?>
                    <img src="uploads/<?=$arr[$i]?>" alt="<?=$arr[$i]?>" title="<?=ucfirst($result["denumire"])?>">
                    <?php 
                                endif;
                            endfor;
                        ?>
                </div>
            </div>
            <div class="product-info">
                <h1 id="product-title"><?=$result["denumire"]?></h1>
                <div id="product-category">Categorie:&nbsp;<span
                        class="product-category-name"><?=$result["categorie"]?></span></div>
                <div id="product-price">de la <?=$result["pret"]?> lei</div>
                <hr>
                <button class="product-button">Contacteaz&#259;-ne</button>
                <div id="product-description-feedback">
                    <span id="product-description">Descriere</span>
                </div>
                <div class="product-description">
                    <?=$result["descriere"]?>
                </div>
                <div class="product-feedback">

                </div>
            </div>
        </div>
    </div>
</section>