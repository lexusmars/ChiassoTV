<?php

class CategoriesModel
{
    private static $validation_errors = array();

    public static function getCategories(): array
    {
        $result = DB::query("SELECT * FROM category");
        return self::parseCategories($result);
    }

    public static function getNCategories($n_categories): array
    {
        $result = DB::query("SELECT * FROM category LIMIT %d", $n_categories);
        return self::parseCategories($result);
    }

    public static function countCategories(): int{
        DB::query("SELECT * FROM category");
        return DB::count();
    }

    public static function getCategory(int $id)
    {
        $result = DB::query("SELECT * FROM category WHERE id=%d", $id);
        if(count($result) == 0){
            return null;
        }
        else{
            return self::parseCategories($result)[0];
        }
    }

    public static function delete(int $id): bool {
        return DB::delete("category","id=%s", $id);
    }

    public static function getCategoryImages(): array {
        return glob(CATEGORIES_IMG_PATH.'/*');
    }

    public static function add(array $data){
        if(self::validate($data)){
            $result = DB::query("INSERT INTO category VALUES(0,%s,%s,NOW(),NOW(),%s)", $data["categoryName"],
                $data["categoryDescription"], basename($data["categoryImagePath"]));

            return !$result ? array("C'è stato un problema durante l'inserimento dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        }
        else{
            return self::$validation_errors;
        }
    }

    public static function update(array $data, $id){
        if(self::validate($data)){
            $result = DB::update("category", array(
                "name" => $data["categoryName"],
                "description" => $data["categoryDescription"],
                "img_path" => basename($data["categoryImagePath"]),
                ), "id=%s", $id);

            return !$result ? array("C'è stato un problema durante la modifica dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        }
        else{
            return self::$validation_errors;
        }
    }

    private static function validate(array $data): bool {
        if(!isset($data["categoryName"]) && !isset($data["categoryDescription"]) && !isset($data["categoryImagePath"])){
            self::$validation_errors[] = "È stata inviata una richiesta incompleta. Per favore riprovare.";
        }
        else{
            if(empty($data["categoryName"]) || strlen($data["categoryName"]) > 128){
                self::$validation_errors[] = "Il nome di una categoria non può essere vuoto oppure con una 
                lunghezza superiore a 128 caratteri";
            }

            if(strlen($data["categoryDescription"]) > 1024){
                self::$validation_errors[] = "La descrizione di una categoria non può avere una 
                lunghezza superiore a 1024 caratteri";
            }

            if(strlen($data["categoryImagePath"]) > 2048){
                self::$validation_errors[] = "Il percorso inserito supera i 2048 caratteri";
            }
            elseif(!in_array($data["categoryImagePath"], self::getCategoryImages())){
                self::$validation_errors[] = "L'immagine scelta non esiste. Per favore controllare il percorso inviato";
            }
        }

        return count(self::$validation_errors) == 0;
    }

    private static function parseCategories($data){
        $categories = array();

        foreach ($data as $row) {
            $categories[] = new Category(
                $row["id"],
                $row["name"],
                $row["description"],
                "WORK_IN_PROGRESS",
                $row["created_at"],
                $row["last_edit_at"],
                $row["img_path"]
            );
        }

        return $categories;
    }
}