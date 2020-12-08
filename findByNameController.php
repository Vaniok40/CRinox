<?php
require 'connect.php';
$nume = $_GET["name"];
        $sql = "SELECT * from produse WHERE denumire = '$nume' ORDER BY id DESC";
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
        <?php endforeach; 
        ?>
