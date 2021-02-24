<!DOCTYPE html>
<?php 
session_start();
require 'connect.php';
$id = $_GET["id"];
if(isset($_GET["err"])){
    $err = $_GET["err"];
}
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

if(isset($_SESSION['timeout']) && !in_array($id, $_SESSION['ids'])){
    array_push($_SESSION['ids'], $id);
    $views = "UPDATE produse SET vizualizari = vizualizari + 1 WHERE id = '$id'";
    mysqli_query($connect, $views);
}

$sql = "SELECT * FROM produse WHERE id='$id'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);
$arr = explode(',',$result["poza"]);
?>
<title>CRinox-Shine | <?=ucfirst($result["categorie"])?> din inox | <?=ucfirst($result["denumire"])?> | Pe &#238;ntreg
    teritoriul Republicii Moldova</title>
<!-- <meta name="description"
    content="Crinox Shine - <?=ucfirst($result["categorie"])?>/<?=ucfirst($result["denumire"])?> la cel mai avantajos pret, in orice punct al țării" /> -->
<meta name="keywords"
    content="Inox, Balustrade, Copertine, Porti / Garduri, Scari, Lucrari de inox, Materiale de inox, Balustrade cu laminare">
    <meta property='og:title' content='CRinox-Shine | <?=ucfirst($result["categorie"])?> din inox | <?=ucfirst($result["denumire"])?> | Pe &#238;ntreg
    teritoriul Republicii Moldova' />
    <meta property='og:url' content='https://crinoxshine.md' />
    <meta property='og:type' content='article' />
    <meta property='og:site_name' content='CRinoxShine' />
    <meta property='og:locale' content='ro_MD' />
<link rel="stylesheet" href="css/contactOverlay.css">
<?php require 'views/header.php';?>
<section class="product">
    <div class="container">
        <div class="url">
            <a class="home" href="index.php">Pagina principal&#259;</a>&nbsp;/&nbsp;<a class="catalog-back"
                href="catalog.php">Catalog de lucr&#259;ri</a>&nbsp;/&nbsp;<?=$result["denumire"];?>
        </div>
        <div class="product-grid">
            <div>
                <img class="product-image"
                    src="uploads/<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
                    alt="<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>"
                    title="Crinox-Shine | <?=ucfirst($result["denumire"])?>">
                <div class="additive-images">
                    <?php for($i = 1; $i <= 4; $i++): 
                                if(isset($arr[$i])):
                        ?>
                    <img src="uploads/<?=$arr[$i]?>" alt="<?=$arr[$i]?>" title="<?=ucfirst($item["denumire"])?>">
                    <?php 
                                endif;
                            endfor;
                        ?>
                </div>
            </div>
            <div class="product-info">
                <h1 id="product-title"><?=$result["denumire"]?></h1>
                <div id="product-category">Categorie:&nbsp;<span
                        class="product-category-name"><?=$result["categorie"]?></span></div>
                <div id="product-price">Pre&#355;:&nbsp;<?=$result["pret"]?></div>
                <hr>
                <button onclick="overlayContactOn()" class="product-button">Contacteaz&#259;-ne</button>
                <div id="product-description-feedback">
                    <span id="product-description">Descriere</span>
                </div>
                <div class="product-description">
                    <?=$result["descriere"]?>
                </div>
                <div class="product-feedback">

                </div>
            </div>
        </div>
    </div>
</section>
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
                <div onclick="writeNew()" class="write">Scrie o recenzie</div>
            </div>
            <hr class="feedback-hr">
            <form onsubmit="return false" class="feedback-form" method="POST">
                <div class="name-label">Nume</div>
                <input id="name" maxlength="50" required placeholder="Introduce-&#355;i numele" name="name" type="text">
                <div class="email-label">E-mail</div>
                <input id="email" required placeholder="E-mail" name="email" type="email">
                <div class="rating-label">Evaluare&nbsp;&nbsp;<span
                        class="no-stars"><?php if(isset($err) && $err == 0){echo "Nu a fost selectat rateing-ul";}else{echo "";}?></span>
                </div>
                <div class="stars">
                    <i class="far fa-star star" data-index="0"></i>
                    <i class="far fa-star star" data-index="1"></i>
                    <i class="far fa-star star" data-index="2"></i>
                    <i class="far fa-star star" data-index="3"></i>
                    <i class="far fa-star star" data-index="4"></i>
                </div>
                <div class="comment-label">Recenzia</div>
                <textarea id="comment" maxlength="574" required
                    placeholder="Scrie ce p&#259;rere ai despre aceast&#259; lucrare" name="comment" cols="30"
                    rows="10"></textarea>
                <input onclick="addComment(<?=$id?>)" value="Posteaz&#259; recenzia" type="submit">
                <hr class="feedback-hr">
            </form>
            <div class="comments">
                <?php 
                        $sql2 = "SELECT nume, DATE_FORMAT(data_coment, '%d-%m-%Y') as data_coment, rate, comentariu from confirmate WHERE id_produs = '$id' ORDER BY id DESC";
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
<?php
require 'views/footer.php';
?>
<div class="overlay"></div>
<section class="contact-us container contact-us-overlay">
    <div onclick="closeOverlay()" class="x"></div>
    <div class="container">
        <div class="contact-bg">
            <div>
                <h1 class="contact-title">
                    <span class="circles">&#x25CF;&nbsp;&nbsp;</span><span>Contacteaz&#259;-ne</span><span
                        class="circles">&nbsp;&nbsp;&#x25CF;</span>
                </h1>
                <div class="contact-data">
                    <div>
                        <div><img src="img/location.svg" alt="location">&nbsp;str. Mihai Eminescu 50</div>
                        <div class="space-data">Chisinau,&nbsp;MD&nbsp;-&nbsp;2008</div>
                    </div>
                    <div>
                        <div><img src="img/phone-call-gray.svg" alt="phone">&nbsp;+373641235156</div>
                        <div class="space-data"><img src="img/mail.svg" alt="mail">&nbsp;hello@cronixshine.com</div>
                    </div>
                </div>
                <form action="mail.php" method="post">
                    <input maxlength="50" name="name" placeholder="Nume" type="text">
                    <input maxlength="50" name="email" placeholder="E-mail" type="email">
                    <input maxlength="20" class="mail-email" name="tel" placeholder="Telefon" required type="text">
                    <textarea maxlength="500" maxlength="170" placeholder="Mesaj" name="message"></textarea>
                    <input type="submit" value="Expediaz&#259;">
                </form>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2737.5274966165452!2d28.06461821556225!3d46.675589079133935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40ca10f334c82a67%3A0x273c0e79b27f42e2!2zU3RyYWRhIE1paGFpIEVtaW5lc2N1IDUwLCBIdciZaSA3MzUxMDAsINCg0YPQvNGL0L3QuNGP!5e0!3m2!1sru!2s!4v1606557921452!5m2!1sru!2s"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
</section>