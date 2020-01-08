<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 28.09.2019
 * Time: 14:43
 */

class Admin
{
    public function index(){
        // Check user auth status
        if(Auth::isAuthenticated()){
            // If logged in: show index page (admin panel)
            $this->home();
        }
        else{
            // If not authenticated, show login page
            ViewLoader::load("admin/login");
        }
    }

    /* Loads home page with website statistics */
    public function home(){
        if(Auth::isAuthenticated()){
            ViewLoader::load("admin/templates/header");
            ViewLoader::load("admin/index");
            ViewLoader::load("admin/templates/footer");
        }
        else{
            Application::redirect("admin/login");
        }
    }

    /* Loads categories management page */
    public function categories(){
        if(Auth::isAuthenticated()){
            $categories  = CategoriesModel::getCategories();
            ViewLoader::load("admin/templates/header");
            ViewLoader::load("admin/categories",array(
                    "categories"=>$categories,
                )
            );
            ViewLoader::load("admin/templates/footer");
        }
        else{
            // Redirect to home page -> Login panel
            Application::redirect("admin");
        }
    }

    /* Loads episodes management page */
    public function episodes($id=null){
        if(Auth::isAuthenticated()){
            if($id != null && is_numeric($id)) {
                $category  = CategoriesModel::getCategory($id);
                $episodes = EpisodeModel::getCategoryEpisodes($category);

                ViewLoader::load("admin/templates/header");
                ViewLoader::load("admin/episodes_manager",array(
                    "category"=>$category, "episodes"=>$episodes
                ));
                ViewLoader::load("admin/templates/footer");
            }
            else{
                $categories  = CategoriesModel::getCategories();
                ViewLoader::load("admin/templates/header");
                ViewLoader::load("admin/episodes",array(
                    "categories"=>$categories,"index"=>0));
                ViewLoader::load("admin/templates/footer");
            }
        }
        else{
            // Redirect to home page -> Login panel
            Application::redirect("admin");
        }
    }

    public function banner(){
        if(Auth::isAuthenticated()){
            // Load data
            $banner_images = BannerModel::getBannerImages();
            $subscription_types = SubscriptionModel::getSubscriptionTypes();

            $isDataOk = count($banner_images) > 0 && count($subscription_types) > 0;
            ViewLoader::load("admin/templates/header");
            ViewLoader::load("admin/banner",array(
                "isDataOk" => $isDataOk,
                "banner_images" => $banner_images,
                "subscription_types" => $subscription_types
            ));
            ViewLoader::load("admin/templates/footer");
        }
        else{
            // Redirect to home page -> Login panel
            Application::redirect("admin");
        }
    }

    public function client(){
        if(Auth::isAuthenticated()){
            // Load data
            ViewLoader::load("admin/templates/header");
            ViewLoader::load("admin/client", array(
                "clients"=>ClientModel::getClients()
            ));
            ViewLoader::load("admin/templates/footer");
        }
        else{
            // Redirect to home page -> Login panel
            Application::redirect("admin");
        }
    }

    /**
     * This function is used to logout the user. It deletes all the user's session variables.
     */
    public function logout(){
        if(Auth::isAuthenticated()){
            Auth::logout();
        }
        Application::redirect("admin");
    }

    /**
     * This function is used to sanitize a value.
     * @param $data string String to sanitize
     * @return string String sanitized
     */
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * This function is used to login the user using the login form (index.php page)
     */
    public function auth(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Sanitize all post data
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Export and sanitize the data
            $username = $this->test_input($_POST["username"]);
            $password = $this->test_input($_POST["password"]);

            // Create model that handles the login process
            $login = new LoginModel($username, $password);

            // Try to login with the passed credentials
            $data = $login->auth();

            if($data instanceof User){
                $_SESSION["auth"] = true;
                $_SESSION["user"] = $data;
            }
            else{
                $GLOBALS["NOTIFIER"]->add("Wrong user or password. Try again");
                $this->logout();
            }
        }

        Application::redirect("admin");
    }
}