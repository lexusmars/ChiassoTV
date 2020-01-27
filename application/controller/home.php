<?php

class Home
{
    public function index()
    {
        ViewLoader::load('home/templates/header');

        ViewLoader::load('_globals/loading_screen');

        // Load latest chiasso tv episode
        $chiasso_news_episode = EpisodeModel::getLatestEpisodeFromCategory(CHIASSO_NEWS_CATEGORY_ID);

        // Load all available sponsors banners
        $banners = BannerModel::getAvailableBanners();

        ViewLoader::load('home/index', array(
            "chiasso_news_episode" => $chiasso_news_episode,
            "categories" => CategoriesModel::getNCategories(N_CATEGORIES_HOMEPAGE),
            "newest_episodes" => EpisodeModel::getNewestVideos(N_NEWEST_VIDEOS_HOMEPAGE),
            "banners" =>  $banners,
        ));

        ViewLoader::load("_globals/loading_handler");

        ViewLoader::load('_globals/footer');
    }
}
