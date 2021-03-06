<?php

class Application
{
    private $url_controller = null;
    private $url_action = null;
    private $url_parameter_1 = null;
    private $url_parameter_2 = null;
    private $url_parameter_3 = null;

    public function __construct()
    {
        $this->splitUrl(); //funzione da creare per dividere l'URL

        // Check for 'robots.txt'
        if($this->url_controller == "robots.txt"){
            ViewLoader::loadFile(ROBOTS_PATH, ViewLoader::CONTENT_TYPE_TEXT);
            exit;
        }
        elseif($this->url_controller == "sitemap.xml"){
            ViewLoader::loadFile("crawlers/sitemap.xml", ViewLoader::CONTENT_TYPE_XML);
            exit();
        }
        elseif($this->url_controller == "google5f5650bb5e8ff8c0.html"){
            ViewLoader::loadFile("crawlers/google5f5650bb5e8ff8c0.html", ViewLoader::CONTENT_TYPE_TEXT);
            exit();
        }

        /* Maintenance check -> only admins can access the website */
        if(MAINTENANCE && $this->url_controller != "admin" && !Auth::isAuthenticated()){
            ViewLoader::load("manutenzione/templates/header");
            ViewLoader::load("manutenzione/index");
            ViewLoader::load("_globals/footer");
            exit;
        }

        if (file_exists('./application/controller/' . $this->url_controller . '.php')) {
            require './application/controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

            if (method_exists($this->url_controller, $this->url_action)) {
                if (isset($this->url_parameter_3)) {
                    $this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2,
                        $this->url_parameter_3);
                } elseif (isset($this->url_parameter_2)) {
                    $this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2);
                } elseif (isset($this->url_parameter_1)) {
                    $this->url_controller->{$this->url_action}($this->url_parameter_1);
                } else {
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                $this->url_controller->index();
            }
        } else {
            if($this->url_controller == ''){
                //INDEX PAGE
                require DIR . 'application/controller/home.php';
                $home = new Home();
                $home->index();
            }
            else{
                //404 Not Found
                ViewLoader::load("templates/404");
            }
        }
    }

    /**
     * Splitto l'url URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // tolgo il carattere / dalla fine della stringa
            $url = rtrim($_GET['url'], '/');
            //rimuove tutti i caratteri illegali dall'URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //divido in un array in base al carattere /
            $url = explode('/', $url);

            // divido le parti dell'utl in base a controller, azione e 3 parametri
            $this->url_controller = (isset($url[0]) ? $url[0] : null);
            $this->url_action = (isset($url[1]) ? $url[1] : null);
            $this->url_parameter_1 = (isset($url[2]) ? $url[2] : null);
            $this->url_parameter_2 = (isset($url[3]) ? $url[3] : null);
            $this->url_parameter_3 = (isset($url[4]) ? $url[4] : null);

            // Per debug
            // echo 'Controller: ' . $this->url_controller . '<br />';
            // echo 'Action: ' . $this->url_action . '<br />';
            // echo 'Parameter 1: ' . $this->url_parameter_1 . '<br />';
            // echo 'Parameter 2: ' . $this->url_parameter_2 . '<br />';
            // echo 'Parameter 3: ' . $this->url_parameter_3 . '<br />';
        }
    }

    public static function redirect($path){
        Header("Location: " . self::buildUrl($path));
        exit();
    }

    public static function buildUrl($path){
        return URL . $path;
    }
}
