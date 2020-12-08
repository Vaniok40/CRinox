<?php
require 'connect.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location: index.php");
}
?>

<link rel="stylesheet" href="css/adminCatalog.css">
<div class="container">
    <div class="functionality">
        <button onclick="addNew()" class="add">
            <img src="img/plus.svg" alt="plus">&nbsp;&nbsp;Adaug&#259; lucrare
        </button>
        <div class="category">
            Categorie&nbsp;
            <select onchange="select(this)" name="category" id="category">
                <option select value="*">toate</option>
                <option value="balustrade">balustrade</option>
                <option value="balustrade cu laminare">balustrade cu laminare</option>
                <option value="copertine">copertine</option>
                <option value="por&#355;i/garduri">por&#355;i/garduri</option>
                <option value="sc&#259;ri">sc&#259;ri</option>
            </select>
        </div>
        <div class="find-container">
            <img src="img/search.svg" alt="search">
            <input onchange="find(this)" class="find" type="text" placeholder="Cauta">
        </div>
        <a href="logout.php">
            <div class="logout">
                <img src="img/log-out.svg" alt="log-out">&nbsp;Deconecta&#355;i-v&#259;
            </div>
        </a>
    </div>
    <div class="sort">
        <div class="sort-category">Lucr&#259;ri</div>
        <div class="sort-category">Pre&#355;</div>
        <div class="sort-category">Categorie</div>
        <div class="sort-category">Vizualiz&#259;ri</div>
        <div class="sort-category">Recenzii</div>
        <div class="sort-category">Op&#355;iuni</div>
    </div>
    <div class="products-grid">
        <?php
        $sql = "SELECT * from produse ORDER BY id DESC";
        $query = mysqli_query($connect,$sql);
        foreach($query as $item):
    ?>
        <div class="product">
            <div class="product-img-name">
                <img src="uploads/<?=$item["poza"]?>" alt="<?=$item["poza"]?>">
                <div>
                    <?php
                        if(strlen($item["denumire"]) > 20){
                            for($i = 0; $i < 17; $i++){
                               echo $item["denumire"][$i];
                            }
                            echo "...";
                        }
                        else{
                           echo $item["denumire"]; 
                        }
                    ?>
                </div>
            </div>
            <div class="product-price">
                de la <?=$item["pret"]?> lei
            </div>
            <div class="product-category">
                <?=$item["categorie"]?>
            </div>
            <div class="product-views">
                <?=$item["vizualizari"]?>
            </div>
            <div class="product-feedback">

            </div>
            <div class="product-option">
                <a href="editProduct.php?id=<?=$item["id"]?>" class="edit">
                    <img src="img/edit.svg" alt="edit">
                    Editeaz&#259;
                </a>
                <a href="deleteProduct.php?id=<?=$item["id"]?>" class="delete">
                    <img src="img/trash.svg" alt="trash">
                    &#350;terge
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="js/adminCatalog.js"></script>