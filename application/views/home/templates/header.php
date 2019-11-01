<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="ChiassoTV è una web tv Ticinese che punta a portare contenuti inediti ed originali
            relativi al territorio del Mendrisiotto.">
    <meta name="keywords" content="Home page,Web TV,Chiasso, Ticino, Switzerland,ChiassoTV">
    <meta name="author" content="Luca Di Bello,Giacomo Morandi Editore Switzerland">

    <title><?php echo APP_NAME ?> - la web tv Ticinese</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/application/assets/img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/application/assets/img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/application/assets/img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/application/assets/img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/application/assets/img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/application/assets/img/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/application/assets/img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/application/assets/img/favicon/favicon-16x16.png" sizes="16x16" />
    <meta name="application-name" content="Homepage di ChiassoTV"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="/application/assets/img/favicon/mstile-144x144.png" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/application/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/application/assets/css/mdb.min.css" rel="stylesheet">
    <!-- Swiper.js style -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <!-- JQuery -->
    <script type="text/javascript" src="/application/assets/js/jquery-3.4.1.min.js"></script>
    <!-- Personal stylesheet -->
    <link rel="stylesheet" href="/application/assets/css/style.css">

</head>
<style>

    .top-nav-collapse {
        background-color: #4285F4;
    }

    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }

    @media only screen and (max-width: 600px) {
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }
    }

    .nav-link{
        color: white !important;
    }

    .top-nav-collapse .nav-link{
        color: black !important;
        background-color: #4285F4;
    }

    .nav-link.active{
        color: white !important;
        font-weight: bolder;
    }


</style>

<body class="grey lighten-3" data-spy="scroll" data-target="#chiassoTvNavbar" data-offset="0">

<!--Main Navigation-->
<header class="d-none">
    <nav id="chiassoTvNavbar" class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar">
        <a class="navbar-brand" href="/">
            <img src="/application/assets/img/logo/logo.png" height="40" alt="ChiassoTV logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#chiassoNewsVideo">Chiasso News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#categories-container">Serie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ultimi-caricamenti">Ultimi caricamenti</a>
                </li>
            </ul>
            <span class="nav-item">
                <a class="nav-link" href="/contatti" style="color: white !important;">Contatti</a>
            </span>
        </div>
    </nav>
</header>
<!--Main Navigation-->