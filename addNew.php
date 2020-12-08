<?php
session_start();
if(!isset($_SESSION["admin"])){
    header("Location: index.php");
} 
?>

<link rel="stylesheet" href="css/addNew.css">

<div class="container">
    <form action="addNewController.php" method="POST" class="product-grid">
        <div class="product-image">
            <img src="uploads/Lucrare1.png" alt="lucrare">
            <div class="additive-images">
                <img src="uploads/Lucrare2.png" alt="">
                <img src="uploads/Lucrare2.png" alt="">
                <img src="uploads/Lucrare2.png" alt="">
                <img src="uploads/Lucrare2.png" alt="">
            </div>
            <div class="upload">
                <label for="upload-photo"><img src="img/black-plus.svg" alt="plus">&nbsp;Adaug&#259; o imagine</label>
                <input onchange="" name="img" type="file" name="photo" id="upload-photo" />
            </div>
        </div>
        <div class="product-info">
            <div class="preview">
                <img src="img/eye.svg" alt="eye">&nbsp;Previzualizare
            </div>
            <div \>
                <div class="title">Titlul lucr&#259;ri</div>
                <input class="input" name="title" type="text" placeholder="Titlul">
                <div class="price">De la c&#226;t se &#238;ncepe pre&#355;ul</div>
                <input class="input" name="price" type="text" placeholder="Pre&#355;">
                <div class="category">categorie</div>
                <div class="categories">
                    <label><input name="category" value="balustrade" type="radio">&nbsp;Balustrade</label>
                    <label><input name="category" value="balustrade cu laminare" type="radio">&nbsp;Balustrade cu
                        laminare</label>
                    <label><input name="category" value="copertine" type="radio">&nbsp;Copertine</label>
                    <label><input name="category" value="por&#355;i/garduri"
                            type="radio">&nbsp;Por&#355;i/Garduri</label>
                    <label><input name="category" value="sc&#259;ri" type="radio">&nbsp;Sc&#259;ri</label>
                </div>
                <div class="description">
                    Descriere
                </div>
                <textarea placeholder="Descriere" name="description"></textarea>
                <input type="submit" value="Salveaz&#259; lucrarea"><a class="cancel"
                    href="adminCatalog.php">Anuleaz&#259;</a>
            </div>
        </div>
    </form>
</div>
<script src="changeImage.js">
</script>