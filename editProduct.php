<?php
ob_start();
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
    header("Location: index.php");
}
require 'connect.php';
$id = $_GET["id"];
$sql = "SELECT * FROM produse WHERE id = '$id'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);
?>

<link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
<link rel="stylesheet" href="css/editProduct.css">
<div class="container">
    <form action="editProductController.php?id=<?=$id?>" method="POST" class="product-grid">
        <div class="product-info">
            <div class="position">
                <div class="title">Titlul lucr&#259;ri</div>
                <input required class="input" name="title" type="text" value="<?=$result["denumire"]?>" placeholder="Titlul">
                <div class="price">De la c&#226;t se &#238;ncepe pre&#355;ul</div>
                <input required class="input" name="price" type="text" value="<?=$result["pret"]?>" placeholder="Pre&#355;">
                <div class="category">categorie</div>
                <div class="categories">
                    <label><input required name="category" value="balustrade"
                            <?php if(strcmp($result["categorie"], "balustrade")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Balustrade</label>
                    <label><input required name="category" value="balustrade cu laminare"
                            <?php if(strcmp($result["categorie"], "balustrade cu laminare")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Balustrade cu laminare</label>
                    <label><input required name="category" value="copertine"
                            <?php if(strcmp($result["categorie"], "copertine")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Copertine</label>
                    <label><input required name="category" value="porți/garduri"
                            <?php if(strcmp($result["categorie"], "porți/garduri")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Por&#355;i/Garduri</label>
                    <label><input required name="category" value="sc&#259;ri"
                            <?php if(strcmp($result["categorie"], "scări")==0){echo "checked";} else {echo "";}?>
                            type="radio">&nbsp;Sc&#259;ri</label>
                </div>
                <div class="description">
                    Descriere
                </div>
                <textarea required placeholder="Descriere" name="description"><?=$result["descriere"]?></textarea>
                <div>
                    <input type="submit" value="Urm&#259;torul pas"><a class="cancel"
                        href="adminCatalog.php">Anuleaz&#259;</a>
                </div>
            </div>
        </div>
    </form>
    <section class="feedback">
        <div class="container">
            <div class="container2">
                <div class="feedback-title">Recenziile clien&#355;ilor</div>
                <div class="avg-write">
                    <div class="rating">
                        <?php
                            $sql3 = "SELECT AVG(rate) from confirmate WHERE id_produs = '$id'";
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
                            $sql4 = "SELECT * from confirmate WHERE id_produs = '$id'";
                            $query4 = mysqli_query($connect, $sql4);
                            $number4 = mysqli_num_rows($query4);
                            echo "($number4)";
                        ?>
                    </div>
                </div>
                <hr class="feedback-hr">
                <div class="comments">
                    <?php 
                        $sql2 = "SELECT id, nume, DATE_FORMAT(data_coment, '%d-%m-%Y') as data_coment, rate, comentariu from confirmate WHERE id_produs = '$id' ORDER BY id DESC";
                        $query2 = mysqli_query($connect, $sql2);
                        foreach($query2 as $item):
                    ?>
                    <div class="one-comment">
                        <div class="comment-rating">
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
                        <div class="name-date">
                            <span class="comment-name">
                                <?=$item["nume"]?>
                            </span>
                            <span class="comment-date">&#x25CF;&nbsp;<?=$item["data_coment"]?></span>
                            <a href="deleteFeedback.php?id=<?=$item["id"]?>&product=<?=$id?>"><img src="img/trash.svg"
                                    alt="trash"></a>
                        </div>
                        <div class="comment-text">
                            <?=$item["comentariu"]?>
                        </div>
                        <hr class="feedback-hr">
                    </div>
                    <?php endforeach; ?>
                    <div onclick="increment()" class="load-more-btn">
                        <button class="check-more">Vezi mai multe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="js/feedbackEdit.js"></script>
<?php
ob_end_flush();
?>