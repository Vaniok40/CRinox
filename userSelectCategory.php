<?php
require 'connect.php';
function generate($category,$connect){
    $sql = "SELECT * from produse WHERE categorie='$category' ORDER BY id DESC";
    $query = mysqli_query($connect,$sql);
    foreach($query as $item){
        $arr = explode(',',$item["poza"]);
?>
<div>
    <div class="work">
        <a href="product.php?id=<?= $item["id"];?>" class="middle">Detalii</a>
        <img src="uploads/<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
            alt="<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
            title="Crinox-Shine | <?=ucfirst($item["denumire"])?>">
    </div>
    <div class="product-title"><?=$item["denumire"]?></div>
    <div class="product-price"><?=$item["pret"];?></div>
</div>
<?php   
    }
}
    if(isset($_GET['category'])){
        $x = $_GET['category'];
        if($x == "balustrade"){
            generate($x,$connect);
        }
        elseif($x == "balustrade cu laminare"){
            generate($x,$connect);
        }
        elseif($x == "copertine"){
            generate($x,$connect);
        }
        elseif($x == "porți/garduri"){
            generate($x,$connect);
        }
        elseif($x == "scări"){
            generate($x,$connect);
        }
        else{
            $sql = "SELECT * from produse ORDER BY id DESC";
            $query = mysqli_query($connect,$sql);
            foreach($query as $item){
                $arr = explode(',',$item["poza"]);
?>
<div>
    <div class="work">
        <a href="product.php?id=<?= $item["id"];?>" class="middle">Detalii</a>
        <img src="uploads/<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
            alt="<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
            title="Crinox-Shine | <?=ucfirst($item["denumire"])?>">
    </div>
    <div class="product-title"><?=$item["denumire"]?></div>
    <div class="product-price"><?=$item["pret"]?></div>
</div>
<?php
        }
    }
}

?>