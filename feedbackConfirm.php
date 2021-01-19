<?php
ob_start();
session_start();
require 'connect.php';
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
$sql = "SELECT * from neconfirmate";
$query = mysqli_query($connect, $sql);
?>
<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/feedbackConfirm.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
<div class="container">
    <a href="adminCatalog.php" class="back"><img src="img/arrow-left.svg" alt="back">&nbsp;&#206;napoi</a>
    <div class="columns">
        <div>Numele utilizatorului</div>
        <div>Recenzia</div>
        <div>Comentariul</div>
        <div>Lucrare</div>
        <div>Optiuni</div>
    </div>
    <div class="comments">
        <?php 
            foreach ($query as $item):
                $aux = $item["id_produs"];
                $sql2 = "SELECT * from produse WHERE id = '$aux'";
                $query2 = mysqli_query($connect, $sql2);
                $result2 = mysqli_fetch_array($query2);
                $arr2 = explode(",", $result2["poza"]);
        ?>
        <div class="comment">
            <div>
                <div class="username"><?=$item["nume"]?></div>
                <span class="email"><?=$item["email"]?></span>
            </div>
            <div>
                <?php 
                for($i = 1; $i <= 5; $i++):
                    if($i <= $item["rate"]):
                ?>
                <i class="fa fa-star star2"></i>
                <?php
                        else:
                ?>
                <i class="far fa-star"></i>
                <?php
                        endif;
                    endfor;
                ?>
            </div>
            <div>
                <?=$item["comentariu"]?>
            </div>
            <div>
                <a target="_blank" href="product.php?id=<?=$item["id_produs"]?>">
                    <img src="uploads/<?php if(isset($arr2[1])){echo $arr2[1];} else{echo "placeholder.png";}?>"
                        alt="<?php if(isset($arr2[1])){echo $arr2[1];} else{echo "placeholder.png";}?>">&nbsp;
                    <?php
                if(strlen($result2["denumire"]) > 28){
                    for($i = 0; $i < 25; $i++){
                       echo $result2["denumire"][$i];
                    }
                    echo "...";
                }
                else{
                   echo $result2["denumire"]; 
                }
                ?>
                </a>
            </div>
            <div>
                <a class="check" href="feedbackConfirmController.php?id=<?=$item["id"]?>"><img src="img/check.svg"
                        alt="check"></a>
                &nbsp;&nbsp;&nbsp;
                <a class="x" href="deleteFeedbackController.php?id=<?=$item["id"]?>"><img src="img/x-black.svg"
                        alt="x"></a>
            </div>
        </div>
        <?php endforeach; ?>
        <div onclick="increment()" class="load-more-btn">
            <button class="check-more">Vezi mai multe</button>
        </div>
    </div>
</div>
<script src="js/unconfirmed.js"></script>
<?php
ob_end_flush();
?>