<?php 
require 'connect.php';
require 'views/header.php';
// if(!isset($_COOKIE["user"])){
//     $ids = "a,";
//     setcookie("user", true, time() + (86400 * 30), "/");
//     setcookie("userProducts", $ids, time() + (86400 * 30), "/");
// }
?>
<header id="acasa">
    <div class="container">
        <h3>
            Crinox Shine SRL
        </h3>
        <h1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
        </h1>
        <h6>
            Compania Crinox Shine execut&#259; o gam&#259; larg&#259; de balustrade de inox de interior &#351;i
            exterior, diverse
            construc&#355;ii din inox, accesorii pentru mobilier &#351;i buc&#259;t&#259;rie
        </h6>
        <div class="header-button">
            <button>Vezi serviciile noastre</button>
        </div>
    </div>
    <div class="header-scroll">
        <a href="#offers">scroll down</a>
        <div><img src="img/chevron-down.svg" alt="down"></div>
    </div>
</header>
<section id="offers">
    <div id="offer" class="container">
        <div class="offer">
            <img src="img/calitate_impecabila.svg" alt="calitate_impecabila">
            <div>
                <div class="offer-title">Calitate impecabil&#259;</div>
                <div class="offer-description">Lorem ipsum dolor sit amet</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/experti_in_domeniu.svg" alt="experti_in_domeniu">
            <div>
                <div class="offer-title">Exper&#355;i &#238;n domeniu</div>
                <div class="offer-description">Lorem ipsum dolor sit amet</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/echipament_modern.svg" alt="echipament_modern">
            <div>
                <div class="offer-title">Echipament moder</div>
                <div class="offer-description">Lorem ipsum dolor sit amet</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/preturi_rezonabile.svg" alt="preturi_rezonabile">
            <div>
                <div class="offer-title">Pre&#355;uri rezonabile</div>
                <div class="offer-description">Lorem ipsum dolor sit amet</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/abordare_individuala.svg" alt="abordare_individuala">
            <div>
                <div class="offer-title">Abordare individual&#259;</div>
                <div class="offer-description">Lorem ipsum dolor sit amet</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/executare_rapida.svg" alt="executare_rapida">
            <div>
                <div class="offer-title">Executare rapid&#259;</div>
                <div class="offer-description">Lorem ipsum dolor sit amet</div>
            </div>
        </div>
    </div>
</section>
<section id="works" class="best">
    <div class="container">
        <div class="best-title">
            &#x25CF;&nbsp;&nbsp;<span>Ultimele lucr&#259;ri</span>&nbsp;&nbsp;&#x25CF;
        </div>
        <div class="see-all">
            <a href="catalog.php">
                Vezi toate lucr&#259;rile&nbsp;<img src="img/chevron-right.svg" alt="right">
            </a>
        </div>
        <div class="works">
            <?php 
                    $sql = "SELECT id,poza from produse ORDER BY id DESC";
                    $query = mysqli_query($connect,$sql);
                    $i = 0;
                    foreach($query as $item){
                    ?>
            <div class="work"><a href="product.php?id=<?= $item["id"];?>" class="middle">Detalii</a><img
                    src="uploads/<?=$item["poza"];?>" alt="<?=$item["poza"];?>"></div>
            <?php 
                        $i++;
                        if($i == 4){
                        break;
                        }
                    } ?>
        </div>
    </div>
</section>
<section id="about" class="story">
    <div class="container">
        <div class="story-img">
            <img class="story-img1" src="img/story1.png" alt="poza1">
            <img class="story-img2" src="img/story2.png" alt="poza2">
        </div>
        <div class="story-text">
            <div class="story-title">
                &#x25CF;&nbsp;&nbsp;<span>Povestea noastr&#259;</span>&nbsp;&nbsp;&#x25CF;
            </div>
            <div class="story-description">Avem o echip&#259; t&#226;n&#259;r&#259;, energic&#259; &#351;i
                creativ&#259;. Venind la noi, ve&#355;i r&#259;m&#226;ne &#238;ntotdeauna pl&#259;cut surprins de
                munca personalului nostru cu &#238;nalt&#259; calificare, care v&#259; va ajuta &#238;n rezolvarea
                oric&#259;ror probleme. Lucr&#226;nd cu materiale de &#238;nalt&#259; calitate putem garanta
                realizarea excelent&#259; &#351;i durabilitatea produselor noastre, ceea ce v&#259; va convinge
                &#238;nc&#259; o dat&#259; s&#259; v&#259; &#238;ntoarceți la noi.</div>
        </div>
    </div>
</section>
<section class="contact-us">
    <div id="contact" class="contact-us-anchor"></div>
    <div class="container">
        <div>
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
<?php require 'views/footer.php';?>