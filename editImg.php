<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$id = $_GET["id"];
$sql = "SELECT poza FROM produse WHERE id = '$id'";
$query = mysqli_query($connect,$sql);
$result = mysqli_fetch_array($query);
$arr = explode(",",$result['poza']);
?>
<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/editProduct.css">

<form id="form" action="finalAddController.php" method="POST" enctype="multipart/form-data" class="product-image">
    <a href="preview.php?id=<?=$id?>" class="preview">
        <img src="img/eye.svg" alt="eye">&nbsp;Previzualizare
    </a>
    <div class="main-image">
        <div class="options">
            <img src="img/pencil.svg">
        </div>
        <div id="myDropdown" class="dropdown-content">
            <span onclick="closeDropdown();setMain(<?=$id?>)" class="set">Seteaz&#259; ca imagine principal&#259;</span>
            <span onclick="closeDropdown();deleteImage(<?=$id?>)" class="delete">&#350;terge imaginea</span>
        </div>

        <img id="main-image"
            src="<?php if(isset($arr[1])){echo "uploads/" . $arr[1];} else {echo "uploads/placeholder.png";}?>">
    </div>
    <div class="additive-images">
        <img id="img1" src="<?php if(isset($arr[1])){echo "uploads/".$arr[1];} else {echo "";}?>">
        <img id="img2" src="<?php if(isset($arr[2])){echo "uploads/".$arr[2];} else {echo "";}?>">
        <img id="img3" src="<?php if(isset($arr[3])){echo "uploads/".$arr[3];} else {echo "";}?>">
        <img id="img4" src="<?php if(isset($arr[4])){echo "uploads/".$arr[4];} else {echo "";}?>">
    </div>
    <div class="upload">
        <label id="label" for="file"><img src="img/black-plus.svg" alt="plus">&nbsp;Adaug&#259; o imagine</label>
        <input name="file" type="file" id="file" onchange="loadFile(event, <?=$id?>)" accept="image/*" />
        <div class="save-button">
            <input type="submit" value="Salveaz&#259;">
        </div>
    </div>
    <span id="test"></span>
</form>
<script src="js/changeImage.js"></script>
<?php
ob_end_flush();
?>