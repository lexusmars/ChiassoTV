<?php

class Condizioni
{
    public function index()
    {
        // Load data before loading page
        $categories = CategoriesModel::getCategories();

        ViewLoader::load('condizioni/templates/header');

        ViewLoader::load('_globals/loading_screen');

        ViewLoader::load('condizioni/index', array(
            "categories" => $categories,
        ));

        ViewLoader::load("_globals/loading_handler");

        ViewLoader::load('_globals/footer');
    }
}
