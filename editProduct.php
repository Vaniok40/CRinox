<?php
session_start();
    if(!isset($_SESSION["admin"])){
        header("Location: index.php");
    }
require 'connect.php';
$id = $_GET["id"];
$sql = "SELECT * FROM produse WHERE id = '$id'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);
?>

<link rel="stylesheet" href="css/editProduct.css">

<div class="container">
    <form action="editProductController.php?id=<?=$id?>" method="POST" class="product-grid">
        <div class="product-image">
            <img src="uploads/Lucrare1.png" alt="lucrare">
            <div class="upload">
                <label for="upload-photo"><img src="img/black-plus.svg" alt="plus">&nbsp;Adaug&#259; o imagine</label>
                <input name="img" type="file" name="photo" id="upload-photo" />
            </div>
        </div>
        <div class="product-info">
            <div class="preview">
                <img src="img/eye.svg" alt="eye">&nbsp;Previzualizare
            </div>
            <div>
                <div class="title">Titlul lucr&#259;ri</div>
                <input class="input" name="title" type="text" value="<?=$result["denumire"]?>" placeholder="Titlul">
                <div class="price">De la c&#226;t se &#238;ncepe pre&#355;ul</div>
                <input class="input" name="price" type="text" value="<?=$result["pret"]?>" placeholder="Pre&#355;">
                <div class="category">categorie</div>
                <div class="categories">
                    <label><input name="category" value="balustrade"
                            <?php if(strcmp($result["categorie"], "balustrade")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Balustrade</label>
                    <label><input name="category" value="balustrade cu laminare"
                            <?php if(strcmp($result["categorie"], "balustrade cu laminare")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Balustrade cu laminare</label>
                    <label><input name="category" value="copertine"
                            <?php if(strcmp($result["categorie"], "copertine")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Copertine</label>
                    <label><input name="category" value="por&#355;i/garduri"
                            <?php if(strcmp($result["categorie"], "porți/garduri")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Por&#355;i/Garduri</label>
                    <label><input name="category" value="sc&#259;ri"
                            <?php if(strcmp($result["categorie"], "scări")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Sc&#259;ri</label>
                </div>
                <div class="description">
                    Descriere
                </div>
                <textarea placeholder="Descriere" name="description"><?=$result["descriere"]?></textarea>
                <input type="submit" value="Salveaz&#259; lucrarea"><a class="cancel"
                    href="adminCatalog.php">Anuleaz&#259;</a>
            </div>
        </div>
    </form>
</div>