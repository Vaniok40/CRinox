<!DOCTYPE html>
<?php 
session_start();
require 'connect.php';
$inactive = 60*60*24;
if( !isset($_SESSION['timeout']) ){
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
<title>CRinox-Shine | Constructii din Inox</title>
<meta name="keywords"
    content="Inox, Balustrade, Copertine, Porti / Garduri, Scari, Lucrari de inox, Materiale de inox, Balustrade cu laminare">
    <meta property='og:title' content='CRinox-Shine | Constructii din Inox' />
    <meta property='og:url' content='https://crinoxshine.md' />
    <meta property='og:type' content='article' />
    <meta property='og:site_name' content='CRinoxShine' />
    <meta property='og:locale' content='ro_MD' />
<?php require 'views/header.php';?>

<header id="acasa">
    <div class="container">
        <h3>
            Crinox Shine SRL
        </h3>
        <h1>
            Lumea Inoxului -
            Profesionalism, Originalitate, Creativitate, Durabilitate</h1>
        <h6>
            Compania Crinox Shine execut&#259; o gam&#259; larg&#259; de balustrade de inox de interior &#351;i
            exterior, diverse
            construc&#355;ii din inox, accesorii pentru mobilier &#351;i buc&#259;t&#259;rie
        </h6>
        <div class="header-button">
            <a href="#works">Vezi ultimele lucr&#259;ri</a>
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
            </div>
        </div>
        <div class="offer">
            <img src="img/experti_in_domeniu.svg" alt="experti_in_domeniu">
            <div>
                <div class="offer-title">Exper&#355;i &#238;n domeniu</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/echipament_modern.svg" alt="echipament_modern">
            <div>
                <div class="offer-title">Echipament modern</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/preturi_rezonabile.svg" alt="preturi_rezonabile">
            <div>
                <div class="offer-title">Pre&#355;uri rezonabile</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/abordare_individuala.svg" alt="abordare_individuala">
            <div>
                <div class="offer-title">Abordare individual&#259;</div>
            </div>
        </div>
        <div class="offer">
            <img src="img/executare_rapida.svg" alt="executare_rapida">
            <div>
                <div class="offer-title">Executare rapid&#259;</div>
            </div>
        </div>
    </div>
</section>
<section id="works" class="best">
    <div class="container">
        <h1 class="best-title">
            <span class="circles">&#x25CF;&nbsp;&nbsp;</span><span>Ultimele lucr&#259;ri</span><span
                class="circles">&nbsp;&nbsp;&#x25CF;</span>
        </h1>
        <div class="see-all">
            <a href="catalog.php">
                Vezi toate lucr&#259;rile&nbsp;<img src="img/chevron-right.svg" alt="right">
            </a>
        </div>
        <div class="works">
            <?php 
                    $sql = "SELECT id, denumire, poza from produse ORDER BY id DESC";
                    $query = mysqli_query($connect,$sql);
                    $i = 0;
                    foreach($query as $item){
                    $arr = explode(',',$item["poza"]);
                    ?>
            <div class="work"><a href="product.php?id=<?=$item["id"];?>" class="middle">Detalii</a><img
                    src="uploads/<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>" alt="<?php if(isset($arr[1])){echo $arr[1];} else{echo "placeholder.png";}?>
                    " title="Crinox-Shine | <?=ucfirst($item["denumire"])?>"></div>
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
                <span class="circles">&#x25CF;&nbsp;&nbsp;</span><span>Povestea noastr&#259;</span><span
                    class="circles">&nbsp;&nbsp;&#x25CF;</span>
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
                <h1 class="contact-title">
                    <span class="circles">&#x25CF;&nbsp;&nbsp;</span><span>Contacteaz&#259;-ne</span><span
                        class="circles">&nbsp;&nbsp;&#x25CF;</span>
                </h1>
                <div class="contact-data">
                    <div>
                        <div><img src="img/location.svg" alt="location">&nbsp;str. Matei Basarab 5/1 of.9</div>
                        <div class="space-data">Chisinau,&nbsp;MD&nbsp;-&nbsp;2045</div>
                    </div>
                    <div>
                        <div><img src="img/phone-call-gray.svg" alt="phone">&nbsp;+37369706727</div>
                        <div class="space-data"><img src="img/mail.svg" alt="mail">&nbsp;preguzaalexandru@gmail.com</div>
                    </div>
                </div>
                <form action="mail.php" method="post">
                    <input maxlength="50" name="name" placeholder="Nume" required type="text">
                    <input maxlength="50" class="mail-email" name="email" placeholder="E-mail" required type="email">
                    <input maxlength="20" class="mail-email" name="tel" placeholder="Telefon" required type="text">
                    <textarea maxlength="500" class="mail-message" placeholder="Mesaj" required name="message"></textarea>
                    <input class="mail-submit" type="submit" value="Expediaz&#259;">
                </form>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6014.792041022643!2d28.864925075292483!3d47.054820516057056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97ce3bcd5fd21%3A0xddc900d52c8da6ad!2zU3RyYWRhIE1hdGVpIEJhc2FyYWIgNS8xLCBDaGnImWluxIN1LCDQnNC-0LvQtNCw0LLQuNGP!5e0!3m2!1sru!2s!4v1614082530244!5m2!1sru!2s"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
</section>
<?php require 'views/footer.php';?>