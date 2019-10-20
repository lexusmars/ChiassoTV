<?php

class Serie
{
    public function index()
    {
        // Load data before loading page
        $categories = CategoriesModel::getCategories();

        ViewLoader::load('serie/templates/header');

        ViewLoader::load('_globals/loading_screen');

        ViewLoader::load('serie/index', array(
            "categories" => $categories,
        ));

        ViewLoader::load("_globals/loading_handler");

        ViewLoader::load('_globals/footer');
    }

    public function episodi($category_id){
        $episodes = EpisodeModel::getCategoryEpisodesById($category_id);
        $category_name = CategoriesModel::getCategory($category_id)->getCategoryName();

        ViewLoader::load('serie/templates/header');

        //ViewLoader::load('_globals/loading_screen');

        ViewLoader::load('serie/episodi', array(
            "episodes" => $episodes,
            "category_name" => $category_name
        ));

        ViewLoader::load("_globals/loading_handler");

        ViewLoader::load('_globals/footer');
    }
}
