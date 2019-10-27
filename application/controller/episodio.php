<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 21.10.2019
 * Time: 18:58
 */

class Episodio
{
    public function index(){
        // Unreachable method -> Redirect
        Application::redirect("");
    }

    public function player($episode_id=null){
        if(!is_null($episode_id)){
            $episode = EpisodeModel::getEpisodeById($episode_id);

            if(is_null($episode)){
                ViewLoader::load("templates/404");
            }
            else{
                ViewLoader::load('episodio/templates/header');

                ViewLoader::load('_globals/loading_screen');

                ViewLoader::load('episodio/index', array(
                    "episode" => $episode,
                ));

                ViewLoader::load("_globals/loading_handler");

                ViewLoader::load('_globals/footer');
            }
        }
        else{
            // Id is null, redirect to homepage
            Application::redirect("");
        }
    }
}