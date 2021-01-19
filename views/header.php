<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon/icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/png" href="img/favicon/apple.png" />
</head>

<body>
    <div id="mySidepanel" class="sidepanel">
        <div class="burger-menu">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="img/x.svg" alt="x"></a>
            <a onclick="closeNav()" href="index.php#acasa">Acas&#259;</a>
            <hr>
            <a onclick="closeNav()" href="index.php#offers">Ce oferim</a>
            <hr>
            <a onclick="closeNav()" href="index.php#works">Lucr&#259;ri</a>
            <hr>
            <a onclick="closeNav()" href="index.php#about">Despre noi</a>
            <hr>
            <a onclick="closeNav()" href="index.php#contact">Contacteaz&#259;-ne</a>
            <hr>
            <a onclick="closeNav()" href="faq.php">FAQ</a>
        </div>
    </div>

    <div class="nav">
        <nav>
            <a id="logo" href="index.php"><img src="img/logo.svg" alt="logo"></a>
            <ul class="nav-list">
                <li><a href="index.php#acasa">Acas&#259;</a></li>
                <li><a href="index.php#offers">Ce oferim</a></li>
                <li><a href="index.php#works">Lucr&#259;ri</a></li>
                <li><a href="index.php#about">Despre noi</a></li>
                <li><a href="index.php#contact">Contacteaz&#259;-ne</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
            <span>
                <img src="img/phone-call.svg" alt="phone">
                <a href="tel:+37378152213">+373 622 35 156</a>
            </span>
            <span onclick="openNav()" class="burger">
                &#9776;
            </span>
        </nav>
    </div>