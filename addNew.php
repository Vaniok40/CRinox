<?php
ob_start();
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
?>
<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/addNew.css">

<div class="container">
    <form action="addNewController.php" method="POST" enctype="multipart/form-data">
        <div class="product-info">
            <div class="position">
                <div class="title">Titlul lucr&#259;ri</div>
                <input required class="input" name="title" type="text" placeholder="Titlul">
                <div class="price">De la c&#226;t se &#238;ncepe pre&#355;ul / Negociabil</div>
                <input required class="input" name="price" type="text" value="Negociabil" placeholder="de la (pre&#355;) lei / Negociabil">
                <div class="category">categorie</div>
                <div class="categories">
                    <label><input name="category" required value="balustrade" type="radio">&nbsp;Balustrade</label>
                    <label><input name="category" required value="balustrade cu laminare" type="radio">&nbsp;Balustrade cu
                        laminare</label>
                    <label><input name="category" required value="copertine" type="radio">&nbsp;Copertine</label>
                    <label><input name="category" required value="porți/garduri" type="radio">&nbsp;Por&#355;i/Garduri</label>
                    <label><input name="category" required value="sc&#259;ri" type="radio">&nbsp;Sc&#259;ri</label>
                </div>
                <div class="description">
                    Descriere
                </div>
                <textarea required placeholder="Descriere" name="description"></textarea>
                <div>
                    <input type="submit" value="Urm&#259;torul pas"><a class="cancel"
                        href="adminCatalog.php">Anuleaz&#259;</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
ob_end_flush();
?>