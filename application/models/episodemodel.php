<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 06.10.2019
 * Time: 15:06
 */

class EpisodeModel
{
    public function getEpisodes(): array{
        return self::parseEpisodes(DB::query("SELECT * FROM episode"));
    }

    public static function getCategoryEpisodes(Category $category){
        return self::parseEpisodes(DB::query(
            "SELECT * FROM episode WHERE category_id = %d", $category->getCategoryId())
        );
    }

    public static function delete(int $episode_id, $category_id): bool {
        return DB::delete("episode","episode_number=%d AND category_id=%d", $episode_id, $category_id);
    }
    /*
     * TODO: FINISH THESE METHODS
    public static function countEpisodes(){

        return
    }

    public static function countCategoryEpisodes(){

    }
    */

    private static function parseEpisodes($data){
        $episodes = [];

        foreach($data as $row){
            $episodes[] = new Episode(
                $row["episode_number"],
                $row["category_id"],
                $row["link"],
                $row["title"],
                $row["description"],
                $row["created_by"],
                $row["created_on"]
            );
        }

        return $episodes;
    }
}