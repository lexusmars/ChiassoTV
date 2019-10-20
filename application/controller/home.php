<?php

class Home
{
    public function index()
    {
        ViewLoader::load('home/templates/header');

        ViewLoader::load('_globals/loading_screen');

        ViewLoader::load('home/index', array(
            "categories" => CategoriesModel::getNCategories(N_CATEGORIES_HOMEPAGE),
        ));

        ViewLoader::load("_globals/loading_handler");

        ViewLoader::load('_globals/footer');
    }
}
