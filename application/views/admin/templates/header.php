<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="ChiassoTV admin panel">
    <meta name="keywords" content="Management,Admin,Admin panel,ChiassoTV">
    <meta name="author" content="Luca Di Bello">

    <title><?php echo APP_NAME ?> - Pannello Admin</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/application/assets/img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/application/assets/img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/application/assets/img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/application/assets/img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/application/assets/img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/application/assets/img/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/application/assets/img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/application/assets/img/favicon/favicon-16x16.png" sizes="16x16" />
    <meta name="application-name" content="Pannello admin per la gestione di ChiassoTV"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="/application/assets/img/favicon/mstile-144x144.png" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/application/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/application/assets/css/mdb.min.css" rel="stylesheet">
    <!-- datatables.css -->
    <link href="/application/assets/css/addons/datatables.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="/application/assets/js/jquery-3.4.1.min.js"></script>
    <!-- Smart select -->
    <link href="/application/assets/css/selectize.bootstrap3.css" rel="stylesheet">

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
    </style>
</head>

<body class="grey lighten-3">

<!--Main Navigation-->
<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="home" target="_blank">
                <strong class="blue-text"><?php echo APP_NAME ?></strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect" href="<?php echo Application::buildUrl('admin/home') ?>">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="<?php echo Application::buildUrl('admin/categories') ?>" target="_top">
                            Gestione categorie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="<?php echo Application::buildUrl('admin/episodes') ?>" target="_top">
                            Gestione episodi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="<?php echo Application::buildUrl('admin/banner') ?>" target="_top">
                            Gestione banner
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="<?php echo Application::buildUrl('admin/client') ?>" target="_top">
                            Gestione clienti
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="<?php echo Application::buildUrl('admin/display') ?>" target="_top">
                            Gestione display
                        </a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="/admin/logout"
                           class="nav-link border border-light rounded waves-effect"
                           target="_top">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->