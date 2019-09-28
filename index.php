<?php
// carico il file di configurazione
require 'application/config/config.php';

// carico le classi dell'applicazione
require 'application/libs/application.php';

// Lib for page loading
require 'application/libs/viewloader.php';

// Lib for authentication
require 'application/libs/auth.php';

// Lib for notification management
require 'application/libs/notifier.php';

// Composer autoload
require 'vendor/autoload.php';

// faccio partire l'applicazione
$app = new Application();
