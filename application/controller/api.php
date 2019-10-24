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
            }
            elseif($action == "add" && $_SERVER["REQUEST_METHOD"] == "POST"){
                // Sanitize POST data and add record to database
                $result = CategoriesModel::add(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));

                // If it detects errors
                if(is_array($result)){
                    $GLOBALS["NOTIFIER"]->add_all($result);
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
            if($action==ImageApi::UPLOAD_ACTION && $_SERVER["REQUEST_METHOD"] == "POST" &&
                isset($_FILES["category_image_upload"])){

                var_dump($_FILES);

                // Setup final path
                $result = ImageModel::uploadFile($_FILES["category_image_upload"], CATEGORIES_IMG_PATH);

                if(is_string($result)){
                    $GLOBALS["NOTIFIER"]->add($result);
                }
            }
            Application::redirect("admin/categories");
        }
        else{
            Application::redirect("");
        }
    }
}

abstract class ImageApi{
    public const UPLOAD_ACTION = "upload";
}