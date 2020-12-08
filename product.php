<?php 
require 'connect.php';
require 'views/header.php';
$id = $_GET["id"];

// if(!isset($_COOKIE["user"])){
//     $ids = "a,";
//     setcookie("user", true, time() + (86400 * 30), "/");
//     setcookie("userProducts", $ids, time() + (86400 * 30), "/");
//     $_COOKIE["userProducts"] .= ",". $id;
//     $views = "UPDATE produse SET vizualizari = vizualizari + 1 WHERE id = '$id'";
//     mysqli_query($connect, $views);
// }

// if(isset($_COOKIE["user"]) && !in_array($id, explode("," ,$_COOKIE["userProducts"]))){
//     $_COOKIE["userProducts"] .= ",". $id;
//     $views = "UPDATE produse SET vizualizari = vizualizari + 1 WHERE id = '$id'";
//     mysqli_query($connect, $views);
//     echo "<script>alert('nui')</script>";
// }
$sql = "SELECT * FROM produse WHERE id='$id'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);
?>
<link rel="stylesheet" href="css/contactOverlay.css">
<div class="overlay">
    <div onclick="closeOverlay()" class="x"><img src="img/x.svg" alt="x"></div>
    <section class="contact-us contact-us-overlay">
        <div id="contact" class="contact-us-anchor"></div>
        <div class="container">
            <div class="contact-bg">
                <div>
                    <div class="contact-title">
                        &#x25CF;&nbsp;&nbsp;<span>Contacteaz&#259;-ne</span>&nbsp;&nbsp;&#x25CF;
                    </div>
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
                        <input maxlength="30" name="name" placeholder="Nume" type="text">
                        <input name="email" placeholder="E-mail" type="text">
                        <textarea maxlength="170" placeholder="Mesaj" name="message"></textarea>
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
    <section class="product">
        <div class="container">
            <div class="url">
                <a class="home" href="index.php">Pagina principal&#259;</a>&nbsp;/&nbsp;<a class="catalog-back"
                    href="catalog.php">Catalog de lucr&#259;ri</a>&nbsp;/&nbsp;<?=$result["denumire"];?>
            </div>
            <div class="product-grid">
                <div class="product-image">
                    <img src="uploads/<?=$result["poza"]?>" alt="<?=$result["poza"]?>">
                </div>
                <div class="product-info">
                    <div id="product-title"><?=$result["denumire"]?></div>
                    <div id="product-category">Categorie:&nbsp;<span
                            class="product-category-name"><?=$result["categorie"]?></span></div>
                    <div id="product-price">de la <?=$result["pret"]?> $</div>
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
</div>
<?php
require 'views/footer.php';
?>