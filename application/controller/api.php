<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 05.10.2019
 * Time: 15:14
 */

class Api
{

    // admin/category/delete/<index>
    // admin/category/add
    // api/category/update/<index>
    public function category($action=null, $index=null){
        if(Auth::isAuthenticated()){
            $GLOBALS["NOTIFIER"]->clear();
            if($action=="delete" && !is_null($index)){
                if(!CategoriesModel::delete($index)){
                    $GLOBALS["NOTIFIER"]->add("Non sono riuscito ad eliminare la categoria.");
                }
                else{
                    $GLOBALS["SITEMAP_HANDLER"]->removeLink(sprintf(CATEGORY_LINK_FORMAT, $index));
                }
            }
            elseif($action == "add" && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Sanitize POST data and add record to database
                $result = CategoriesModel::add(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }
                else{
                    $category_id = DB::insertId();
                    $curr_date = new DateTime();

                    $GLOBALS["SITEMAP_HANDLER"]->addLink(sprintf(CATEGORY_LINK_FORMAT, $category_id),
                        $curr_date->format("Y-m-d"));
                }
            }
            elseif($action == "update" && !is_null($index) && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Sanitize POST data and add record to database
                $result = CategoriesModel::update(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING), $index);

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }
            }

            Application::redirect("admin/categories");
        }
        else{
            Application::redirect("");
        }
    }

    public function episode($action=null, $category=null, $episode=null){
        if(Auth::isAuthenticated()){
            $GLOBALS["NOTIFIER"]->clear();
            if($action=="delete" && !is_null($category) && !is_null($episode)){
                if(!EpisodeModel::delete($episode, $category)){
                    $GLOBALS["NOTIFIER"]->add("Non sono riuscito ad eliminare la categoria.");
                }
                else{
                    // Remove link from sitemap
                    $GLOBALS["SITEMAP_HANDLER"]->removeLink(sprintf(EPISODE_LINK_FORMAT, $episode));
                }
                Application::redirect("admin/episodes/$category");
            }

            if($action=="add" && !is_null($category) && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Sanitize POST data and add record to database
                $result = EpisodeModel::add(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING),
                    $_SESSION["user"]->getUsername(), $category);

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }
                else{
                    $video_id = DB::insertId();
                    $curr_date = new DateTime();

                    $GLOBALS["SITEMAP_HANDLER"]->addLink(sprintf(EPISODE_LINK_FORMAT, $video_id),
                        $curr_date->format("Y-m-d"));
                }

                Application::redirect("admin/episodes/$category");
            }

            if($action=="update" && !is_null($category) && !is_null($episode) && $_SERVER["REQUEST_METHOD"] == "POST"){
                //TODO: Finish update
                // Sanitize POST data and add record to database
                $result = EpisodeModel::update(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING),
                    $_SESSION["user"]->getUsername(), $category, $episode);

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }

                Application::redirect("admin/episodes/$category");
            }

            Application::redirect("admin/episodes");
        }
        else{
            Application::redirect("");
        }
    }

    public function image($action=null, $image_type=null){
        if(Auth::isAuthenticated()){
            // Upload banner image
            if($action==ImageApi::UPLOAD_ACTION && $_SERVER["REQUEST_METHOD"] == "POST"
                && $image_type==ImageApi::IMAGE_BANNER && isset($_FILES["category_image_upload"])){

                // Upload image to server
                $result = ImageModel::uploadFile($_FILES["category_image_upload"], BANNERS_IMG_PATH);

                if(is_string($result)){
                    $GLOBALS["NOTIFIER"]->add($result);
                }
                Application::redirect("admin/banner");
            }
            // Upload category image
            elseif($action==ImageApi::UPLOAD_ACTION && $_SERVER["REQUEST_METHOD"] == "POST" &&
                isset($_FILES["category_image_upload"])){

                // Setup final path
                $result = ImageModel::uploadFile($_FILES["category_image_upload"], CATEGORIES_IMG_PATH);

                if(is_string($result)){
                    $GLOBALS["NOTIFIER"]->add($result);
                }

                Application::redirect("admin/categories");
            }
        }
        else{
            Application::redirect("");
        }
    }

    public function banner($action=null, $index=null){
        if(Auth::isAuthenticated()){
            $GLOBALS["NOTIFIER"]->clear();
            // DELETE BANNER
            if($action=="delete" && !is_null($index)){
                if(!BannerModel::delete($index)){
                    $GLOBALS["NOTIFIER"]->add("Non sono riuscito ad eliminare il banner.");
                }

                Application::redirect("admin/banner");
            }

            // ADD NEW BANNER
            if($action=="add" && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Sanitize POST data and add record to database
                $result = BannerModel::add(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }

                // Redirect back
                Application::redirect("admin/banner");
            }

            if($action=="update" && $_SERVER["REQUEST_METHOD"] == "POST" && !is_null($index)){
                // Sanitize POST data and add record to database
                $result = BannerModel::update(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING), $index);

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }

                // Redirect back
                Application::redirect("admin/banner");
            }
        }
        else{
            header("Access-Control-Allow-Origin: *");
            // This API returns a random video per category
            if(is_null($action) && is_null($index) && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Set page content type
                Header("Content-Type: json");

                // Check if token was sent
                if(isset($_POST["token"])){
                    // Check if token is right
                    if($_POST["token"] == API_TOKEN){
                        // Right token sent

                        // Read data from database
                        $episodes = [];

                        $available_categories = CategoriesModel::getCategories();
                        // Get random episode per category
                        foreach($available_categories as $category){
                            // Get all episodes

                            // Check if the category has actually episodes
                            $category_episodes = EpisodeModel::getCategoryEpisodes($category);

                            if(count($category_episodes) > 0){
                                // Get random episode
                                $episodes[] = $category_episodes[rand(0, count($category_episodes)-1)];
                            }
                            else{
                                // Skip category
                                continue;
                            }
                        }

                        echo json_encode($episodes);
                    }
                    else{
                        // Wrong token
                        return json_encode(array("status"=>"failed", "message"=>"wrong token"));
                    }
                }
                else{
                    // Token wasn't sent
                    return json_encode(array("status"=>"failed", "message"=>"missing token"));
                }
            }
            else{
                Application::redirect("");
            }
        }
    }

    public function client($action=null, $client=null){
        if(Auth::isAuthenticated()){
            $GLOBALS["NOTIFIER"]->clear();

            if($action=="delete" && !is_null($client)){
                if(!ClientModel::delete($client)){
                    $GLOBALS["NOTIFIER"]->add("Non sono riuscito ad eliminare l'utente.");
                }

                Application::redirect("admin/client");
            }
            // ADD NEW CLIENT
            elseif($action=="add" && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Sanitize POST data and add record to database
                $result = ClientModel::add(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }

                // Redirect back
                Application::redirect("admin/client");
            }
            // UPDATE CLIENT
            elseif($action=="update" && !is_null($client) && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Sanitize POST data and update record to database
                $result = ClientModel::update($client, filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
                }

                // Redirect back
                Application::redirect("admin/client");
            }
        }
        else{
            Application::redirect("");
        }
    }
}

abstract class ImageApi{
    public const UPLOAD_ACTION = "upload";
    public const IMAGE_BANNER = "banner";
}