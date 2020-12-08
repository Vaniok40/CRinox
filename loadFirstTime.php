<?php
require 'connect.php';
if(isset($_GET["offset"]) && isset($_GET["limit"])){
    $limit = $_GET["limit"];
    $offset = $_GET["offset"];
$sql = "SELECT * from produse ORDER BY id DESC LIMIT $limit";
$query = mysqli_query($connect,$sql);
foreach($query as $item){
?>  
<div>
<div class="work">
    <a href="product.php?id=<?= $item["id"];?>" class="middle">Detalii</a>
    <img src="uploads/<?=$item["poza"];?>" alt="<?=$item["poza"];?>">
</div>
<div class="product-title"><?=$item["denumire"]?></div>
<div class="product-price"><?php echo "De la " . $item["pret"] . "$"?></div>
</div>
<?php   
}
}
?>