<?php
require 'connect.php';
$categorie = $_GET["category"];
    if($categorie == "*"){
        $sql = "SELECT * from produse ORDER BY id DESC";
        $query = mysqli_query($connect,$sql);
    }
else{
        $sql = "SELECT * from produse WHERE categorie = '$categorie' ORDER BY id DESC";
        $query = mysqli_query($connect,$sql);
}
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
        ?>