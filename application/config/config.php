<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('URL', 'http://localhost:8123/');
define('DIR', 'C:/Users/luca6/Google Drive/Repo/ChiassoTV/');

define('CATEGORIES_IMG_PATH', DIR . '/application/assets/img/categories/');

define('CATEGORIES_IMG_LINK','/application/assets/img/categories/');
define('DEFAULT_CATEGORY_IMG', "not_found.jpg");
define('N_NEWEST_VIDEOS_HOMEPAGE', 10);
define('EPISODES_MANAGER_CATEGORIES_PER_ROW', 3);

$autoload_directories = array(
    "application/libs/",
    "application/models/"
);

define('APP_NAME','ChiassoTV');
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "");
define("DATABASE_NAME", "chiassotv");