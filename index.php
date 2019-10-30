<?php

require __DIR__ . '/application/config/config.php';
require __DIR__ . '/vendor/autoload.php';

foreach($autoload_directories as $directory) {
    $files = glob($directory.'*.php');
    foreach($files as $file) {
        $path = __DIR__.'/'.$file;
        require_once $path;
    }
}

session_start();

// setup database variables
DB::$user = DATABASE_USERNAME;
DB::$password = DATABASE_PASSWORD;
DB::$dbName = DATABASE_NAME;
DB::$host = DATABASE_HOST;

$GLOBALS["NOTIFIER"] = new Notifier();

// faccio partire l'applicazione
$app = new Application();
