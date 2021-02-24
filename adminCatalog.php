<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
?>
<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
<link rel="stylesheet" href="css/adminCatalog.css">
<div class="background"></div>
<div class="overlay">
    <img onclick="closeConfirm()" src="img/x-black.svg" alt="x">
    <div class="trash"><img src="img/red-trash.svg" alt="trash"></div>
    <div class="confirm">Confirma&#355;i &#351;tergerea lucr&#259;rii din catalog</div>
    <div class="ireversibil">Aceast&#259; ac&#355;iune este ireversibil&#259;</div>
    <div class="buttons">
        <a onclick="closeConfirm()" class="cancel" href="">Anuleaz&#259;</a>
        <a class="confirm-delete" href="">&#350;terge</a>
    </div>
</div>
<div class="container">
    <div class="functionality">
        <div>
            <button onclick="addNew()" class="add">
                <img src="img/plus.svg" alt="plus">&nbsp;&nbsp;Adaug&#259; lucrare
            </button>
            <div>
                <a class="feedback" href="messages.php">
                    Mesaje
                    <?php 
                $sql4 = "SELECT * from contact";
                $query4 = mysqli_query($connect, $sql4);
                $num2 = mysqli_num_rows($query4);
                if($num2 > 0 ):
                ?>
                    <span class="feedback-number">
                        <?=$num2;?>
                    </span>
                    <?php 
                endif;
                ?>
                </a>
                <a class="feedback" href="feedbackConfirm.php">
                    Recenzii
                    <?php 
                $sql2 = "SELECT * from neconfirmate";
                $query2 = mysqli_query($connect, $sql2);
                $num = mysqli_num_rows($query2);
                if($num > 0 ):
                ?>
                    <span class="feedback-number">
                        <?=$num;?>
                    </span>
                    <?php 
                endif;
                ?>
                </a>
            </div>
        </div>
        <div>
            <div>
            <div class="category">
                Categorie&nbsp;
                <select onchange="select(this)" name="category" id="category">
                    <option select value="*">Toate</option>
                    <option value="balustrade">Balustrade</option>
                    <option value="balustrade cu laminare">Balustrade cu laminare</option>
                    <option value="copertine">Copertine</option>
                    <option value="por&#355;i/garduri">Por&#355;i/Garduri</option>
                    <option value="sc&#259;ri">Sc&#259;ri</option>
                </select>
            </div>
            <div class="find-container">
                <img src="img/search.svg" alt="search">
                <input onchange="find(this)" class="find" type="text" placeholder="Cauta">
            </div>
            </div>
            <a href="logout.php">
                <div class="logout">
                    <img src="img/log-out.svg" alt="log-out">&nbsp;Deconecta&#355;i-v&#259;
                </div>
            </a>
        </div>
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
            $arr = explode(',',$item["poza"]);
    ?>
        <div class="product">
            <div class="product-img-name">
                <img id="img" src="uploads/<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
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
                <?php
                    $aux = $item["id"];
                    $sql3 = "SELECT AVG(rate) from confirmate WHERE id_produs = '$aux'";
                    $query3 = mysqli_query($connect, $sql3);
                    $result3 = mysqli_fetch_array($query3);
                    $rate3 = round($result3[0]);
                    for($i = 1; $i <= 5; $i++):
                        if($i <= $rate3):
                ?>
                <i class="fa fa-star star2"></i>
                <?php
                        else:
                ?>
                <i class="far fa-star"></i>
                <?php
                        endif;
                    endfor;
                    $sql4 = "SELECT * from confirmate WHERE id_produs = '$aux'";
                            $query4 = mysqli_query($connect, $sql4);
                            $number4 = mysqli_num_rows($query4);
                            echo "($number4)";
                ?>
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
        <?php endforeach; ?>
    </div>
    <div onclick="increment()" class="load-more-btn">
        <button class="check-more">Vezi mai multe</button>
    </div>
</div>
<script src="js/adminCatalog.js"></script>
<script src="js/deleteConfirm.js"></script>

<?php
ob_end_flush();
?>