<?php

class Serie
{
    public function index()
    {
        // Load data before loading page
        $categories = CategoriesModel::getCategories();

        // Load banners
        $banners = BannerModel::getBannersRandomOrder();

        ViewLoader::load('serie/templates/header');

        ViewLoader::load('_globals/loading_screen');

        ViewLoader::load('serie/index', array(
            "categories" => $categories,
            "banners" => $banners
        ));

        ViewLoader::load("_globals/loading_handler");

        ViewLoader::load('_globals/footer');
    }

    public function episodi($category_id=null){

        if(is_null($category_id)){
            Application::redirect("serie");
        }

        $episodes = EpisodeModel::getCategoryEpisodesById($category_id);
        $category= CategoriesModel::getCategory($category_id);

        // Load banners
        $banners = BannerModel::getBannersRandomOrder();

        if(!is_null($category)){
            ViewLoader::load('serie/templates/header');

            ViewLoader::load('_globals/loading_screen');

            ViewLoader::load('serie/episodi', array(
                "episodes" => $episodes,
                "category_name" => $category->getCategoryName(),
                "banners" => $banners
            ));

            ViewLoader::load("_globals/loading_handler");

            ViewLoader::load('_globals/footer');
        }
        else{
            ViewLoader::load("templates/404");
        }
    }
}
