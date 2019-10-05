<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="ChiassoTV admin panel">
    <meta name="keywords" content="Management,Admin,Admin panel,ChiassoTV">
    <meta name="author" content="John Doe">

    <title><?php echo APP_NAME ?> - Pannello Admin</title>
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