<?php
session_start();
require 'connect.php';
$inactive = 60*60*24;
if( !isset($_SESSION['timeout']) ){
    session_start();
    $_SESSION['timeout'] = time() + $inactive;
    $_SESSION['ids'] = array();
}

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive){
    session_unset();
    session_destroy();
}

$_SESSION['timeout']=time();

?>
<title>CRinox-Shine | Catalog de lucr&#259;ri</title>
<?php require 'views/header.php';?>
<section class="catalog">
    <div class="container">
        <div class="url">
            <a class="home" href="index.php">Pagina principal&#259;</a>&nbsp;/&nbsp;Catalog de lucr&#259;ri
        </div>
        <div class="categories">
            &#x25CF;&nbsp;&nbsp;Catalogul de lucr&#259;ri&nbsp;&nbsp;&#x25CF;
        </div>
        <form action="" onsubmit="return false" class="categories-form">
            <label><span class="category-name">Toate</span><input value="*" type="submit" name="category"></label>
            <label><span class="category-name">Balustrade</span><input value="balustrade" type="submit"
                    name="category"></label>
            <label><span class="category-name">Balustrade cu laminare</span><input value="balustrade cu laminare"
                    type="submit" name="category"></label>
            <label><Span class="category-name">Copertine</span><input value="copertine" type="submit"
                    name="category"></label>
            <label><span class="category-name">Por&#355;i/Garduri</span><input value="porți/garduri" type="submit"
                    name="category"></label>
            <label><span class="category-name">Sc&#259;ri</span><input value="scări" type="submit"
                    name="category"></label>
        </form>
        <div class="works-grid">
            <?php
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
                <div class="product-title">
                    <?php
        if(strlen($item["denumire"]) > 24){
            for($i = 0; $i < 21; $i++){
                echo $item["denumire"][$i];
            }
            echo "...";
        }
        else{
            echo $item["denumire"]; 
        }
    ?>
                </div>
                <div class="product-price"><?php echo "De la " . $item["pret"] . " lei"?></div>
            </div>
            <?php   
    }
    ?>
        </div>
        <div onclick="increment()" class="load-more-btn">
            <button class="check-more">Vezi mai multe</button>
        </div>
    </div>
    </div>
</section>
<?php
require 'views/footer.php';
?>