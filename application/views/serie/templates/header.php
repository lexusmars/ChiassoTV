<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="ChiassoTV home page">
    <meta name="keywords" content="Home page,Web TV,Chiasso, Ticino, Switzerland,ChiassoTV">
    <meta name="author" content="Luca Di Bello,Giacomo Morandi Editore Switzerland">

    <title><?php echo APP_NAME ?> - la web tv Ticinese</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/application/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/application/assets/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="/application/assets/js/jquery-3.4.1.min.js"></script>
    <!-- Personal stylesheet -->
    <link rel="stylesheet" href="/application/assets/css/style.css">

</head>
<style>

    .map-container {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-container iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }

    .top-nav-collapse {
        background-color: #4285F4;
    }

    .card-img-top {
        width: 100%;
        height: 13vw;
        object-fit: cover;
    }

    @media only screen and (max-width: 900px) {
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }
    }

    @media only screen and (max-width: 600px) {
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }
    }

    .nav-link{
        color: black;
    }

</style>

<body class="grey lighten-3">

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
                    <a class="nav-link" href="/">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/serie">Serie</a>
                </li>
            </ul>
            <span class="nav-item">
                <a class="nav-link" href="/contatti">Contatti</a>
            </span>
        </div>
    </nav>
</header>
<!--Main Navigation-->