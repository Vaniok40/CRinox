<?php
ob_start();
require 'connect.php';
$nume = $_GET["name"];
        $sql = "SELECT * from produse WHERE denumire = '$nume' ORDER BY id DESC";
        $query = mysqli_query($connect,$sql);
        foreach($query as $item):
            $arr = explode(',',$item["poza"]);
    ?>
<div class="product">
    <div class="product-img-name">
        <img src="uploads/<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
            alt="<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>">
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
        <?=$item["pret"]?>
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
        <a href="#" onclick="openConfirm(<?=$item['id']?>)" class="delete">
            <img src="img/trash.svg" alt="trash">
            &#350;terge
        </a>
    </div>
</div>
<?php endforeach; 
        ob_end_flush();
        ?>