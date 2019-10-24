<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('URL', 'http://localhost:8123/');
define('DIR', 'C:/Users/luca6/Google Drive/Repo/ChiassoTV/');

define('CATEGORIES_IMG_PATH', DIR . 'application/assets/img/categories/');

define('CATEGORIES_IMG_LINK','/application/assets/img/categories/');
define('DEFAULT_CATEGORY_IMG', "not_found.jpg");
define('N_NEWEST_VIDEOS_HOMEPAGE', 10);
define('N_CATEGORIES_HOMEPAGE',4);
define('EPISODES_MANAGER_CATEGORIES_PER_ROW', 3);
define('YOUTUBE_EMBEDDED_VIDEOS_LINK_BASE', "https://www.youtube.com/embed/");
define('YOUTUBE_THUMBNAIL_LINK_BASE', "https://img.youtube.com/vi/%s/mqdefault.jpg");

/* TODO: CHECK NAME */
define('CHIASSO_NEWS_CATEGORY_ID', "31");

$autoload_directories = array(
    "application/libs/",
    "application/models/"
);

define('APP_NAME','ChiassoTV');
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "");
define("DATABASE_NAME", "chiassotv");