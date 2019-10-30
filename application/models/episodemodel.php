<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 06.10.2019
 * Time: 15:06
 */

class EpisodeModel
{
    private static $errors = [];

    public function getEpisodes(): array{
        return self::parseEpisodes(DB::query("SELECT * FROM episode ORDER BY created_on DESC"));
    }

    public static function getCategoryEpisodes(Category $category){
        return self::parseEpisodes(DB::query(
            "SELECT * FROM episode WHERE category_id = %d ORDER BY created_on DESC", $category->getCategoryId())
        );
    }

    public static function getCategoryEpisodesById($category_id){
        return self::parseEpisodes(DB::query(
            "SELECT * FROM episode WHERE category_id = %d ORDER BY created_on DESC", $category_id)
        );
    }

    public static function getEpisodeById($episode_id): Episode{
        return self::parseEpisodes(DB::query(
            "SELECT * FROM episode WHERE episode_number = %d LIMIT 1", $episode_id
        ))[0];
    }

    public static function getLatestEpisodeFromCategory(int $category_id){
        $result = DB::query("SELECT * FROM episode WHERE category_id = %d ORDER BY created_on DESC LIMIT 1", $category_id);

        if(count($result) != 0){
            return self::parseEpisodes($result)[0];
        }
        else{
            return null;
        }
    }

    public static function countEpisodesFromCategory(int $category_id): int{
        DB::query("SELECT * FROM episode WHERE category_id = %d", $category_id);
        return DB::count();
    }

    /* API METHODS */
    public static function delete(int $episode_id, $category_id): bool {
        return DB::delete("episode","episode_number=%d AND category_id=%d", $episode_id, $category_id);
    }

    public static function add(array $data, string $username, int $category_id)
    {
        if(self::validate($data)){
            $result = DB::insert("episode", array(
                "title" => $data["title"],
                "description" => $data["description"],
                "link" => $data["link"],
                "created_by" => $username,
                "category_id" => $category_id
            ));

            return !$result ? array("C'è stato un problema durante l'inserimento dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        }
        else{
            return self::$errors;
        }
    }

    public static function update(array $data, string $username, int $category_id, int $episode_id)
    {
        if(self::validate($data)){
            $result = DB::update("episode", array(
                "title" => $data["title"],
                "description" => $data["description"],
                "link" => $data["link"],
                "created_by" => $username,
                "category_id" => $category_id
            ), "episode_number=%d", $episode_id);

            return !$result ? array("C'è stato un problema durante l'aggiornamento dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        }
        else{
            return self::$errors;
        }
    }

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

    private static function validate(array $data): bool{
        self::$errors = [];

        /* Nome episodio */
        if(!(!empty($data["title"]) && strlen($data["title"]) < 255)){
            self::$errors[] = "Hai inserito un titolo non valido";
        }

        if(!(strlen($data["description"]) < 1024)){
            self::$errors[] = "Hai inserito una descrizione non valida.";
        }

        if(!(!empty($data["link"]) && strlen($data["link"]) < 255)){
            self::$errors[] = "Hai inserito un link non valido";

        }

        return count(self::$errors) == 0;
    }

    /* Used in homepage */
    public static function getNewestVideos($n_videos){
        $result = DB::query("SELECT * FROM episode order by created_on desc LIMIT %d", $n_videos);
        return self::parseEpisodes($result);
    }
}