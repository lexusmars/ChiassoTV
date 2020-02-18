<?php
class DisplayModel
{
    private static $errors = array();
    /**
     * This function returns all the categories that will be shown on the display
     */
    public static function getEnabledCategories(){
        $result = DB::query("SELECT * FROM category WHERE shown_on_display=1");
        return count($result) > 0 ? self::parseCategories($result) : array();
    }

    public static function updateEnabledCategories(array $categories_states){

        // Cycle every row and update data to database
        foreach($categories_states as $category_id => $new_state){
            $status = DB::update("category", array(
                "shown_on_display" => filter_var($new_state,FILTER_VALIDATE_BOOLEAN)
            ), "id=%d", $category_id);

            if(!$status){
                self::$errors[] = "Errore durante l'aggiornamento della categoria con identificativo " . $category_id;
            }
        }
        // Return error messages or true (if no errors)
        return count(self::$errors) > 0 ? self::$errors : true;
    }

    private static function parseCategories($data){
        $categories = array();

        foreach ($data as $row) {
            $categories[] = new Category(
                $row["id"],
                $row["name"],
                $row["description"],
                $row["created_at"],
                $row["last_edit_at"],
                $row["img_path"],
                $row["shown_on_display"]
            );
        }

        return $categories;
    }
}