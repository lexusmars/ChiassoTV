<?php


class ClientModel
{
    public static function getClients(){
        $result = DB::query("SELECT * FROM client");
        return self::parseClients($result);
    }

    public static function getClient($id){
        $result = DB::query("SELECT * FROM client WHERE id=%d",$id);
        return self::parseClient($result);
    }

    private static function parseClient($data){
        return new Client(
            $data["id"],
            $data["name"],
            $data["surname"],
            $data["email"],
            $data["phone"]
        );
    }

    private static function parseClients($data){
        $banners = array();

        foreach ($data as $row) {
            // Parse every row into an object
            $banners[] = self::parseClient($row);
        }

        return $banners;
    }
}