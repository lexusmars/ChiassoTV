<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('URL', 'http://localhost:8080/');
define('DIR', 'C:/Users/luca6/Google Drive/Repo/ChiassoTV/');

define('CATEGORIES_IMG_PATH', DIR . 'application/assets/img/categories/');
define('BANNERS_IMG_PATH', DIR . 'application/assets/img/banners/');

define('CATEGORIES_IMG_LINK','/application/assets/img/categories/');
define('BANNERS_IMG_LINK', '/application/assets/img/banners/');

define('DEFAULT_CATEGORY_IMG', "not_found.jpg");
define('N_NEWEST_VIDEOS_HOMEPAGE', 10);
define('N_CATEGORIES_HOMEPAGE',4);
define('EPISODES_MANAGER_CATEGORIES_PER_ROW', 3);
define('YOUTUBE_EMBEDDED_VIDEOS_LINK_BASE', "https://www.youtube.com/embed/");
define('YOUTUBE_THUMBNAIL_LINK_BASE', "https://img.youtube.com/vi/%s/mqdefault.jpg");
define('CHIASSO_NEWS_CATEGORY_ID', "1");

$autoload_directories = array(
    "application/libs/",
    "application/models/"
);

define('APP_NAME','ChiassoTV');
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "");
define("DATABASE_NAME", "chiassotv");
define("DATABASE_HOST", "localhost");

/* MAINTENANCE FLAG */
//TODO: ADD THIS OPTION IN ADMIN PANEL
define("MAINTENANCE", false);

/* FOR CRAWLERS */
define("ROBOTS_PATH", "crawlers/robots.txt");
define("SITEMAP_PATH", DIR . "application/crawlers/sitemap.xml");

/* FOR SITEMAP */
define("EPISODE_LINK_FORMAT", URL . "episodio/player/%d");
define("CATEGORY_LINK_FORMAT", URL . "serie/episodi/%d");

/* FOR APIs */
define('API_TOKEN', "test_token");