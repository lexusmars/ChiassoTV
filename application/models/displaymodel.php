<?php
class DisplayModel
{
    /**
     * This function returns all the categories that will be shown on the display
     */
    public static function getEnabledCategories(){
        $result = DB::query("SELECT * FROM category WHERE shown_on_display=1");
        return count($result) > 0 ? self::parseCategories($result) : array();
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
                $row["img_path"]
            );
        }

        return $categories;
    }
}