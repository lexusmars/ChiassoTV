<?php

class Home
{
    public function index()
    {
        ViewLoader::load('home/templates/header');
        ViewLoader::load('home/index');
        ViewLoader::load('home/templates/footer');
    }
}
