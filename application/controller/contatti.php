<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 24.10.2019
 * Time: 21:07
 */

class Contatti
{

    public function index(){
        ViewLoader::load('contatti/templates/header');

        ViewLoader::load('_globals/loading_screen');

        ViewLoader::load('contatti/index');

        ViewLoader::load("_globals/loading_handler");

        ViewLoader::load('_globals/footer');
    }

}