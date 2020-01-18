<?php


class ClientModel
{
    private static $errors = [];

    public static function getClients(){
        $result = DB::query("SELECT * FROM client");
        return self::parseClients($result);
    }

    public static function getClient($id){
        $result = DB::query("SELECT * FROM client WHERE id=%d",$id);
        return self::parseClient($result[0]);
    }

    public static function add($data)
    {
        // Validate data
        if(self::validate($data)){
            // data valid
            $result = DB::insert('client', array(
                'name' => $data["name"],
                'surname' => $data["surname"],
                'email' => $data["email"],
                'phone' => $data["phone"]
            ));

            return !$result ? array("C'è stato un problema durante l'inserimento dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        }
        else{
            // data not valid, return errors
            return self::$errors;
        }
    }

    public static function delete($client_id){
        return DB::delete("client","id=%d", $client_id);
    }

    public static function update($client_id, $data){
        // validate data
        if(self::validate($data)){
            // data valid
            $result = DB::update("client", array(
                "name" => $data["name"],
                "surname" => $data["surname"],
                "email" => $data["email"],
                "phone" => $data["phone"],
            ), "id=%d", $client_id);

            return !$result ? array("C'è stato un problema durante l'aggiornamento dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        }
        else{
            // data not valid
            return self::$errors;
        }
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



    private static function validate(array $data): bool{
        self::$errors = [];

        /* Nome cliente */
        if(!(!empty($data["name"]) && strlen($data["name"]) < 255)){
            self::$errors[] = "Hai inserito un nome non valido";
        }

        /* Cognome cliente */
        if(!(!empty($data["surname"]) && strlen($data["surname"]) < 255)){
            self::$errors[] = "Hai inserito un cognome non valido";
        }

        /* Email cliente */
        if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            self::$errors[] = "Hai inserito un'email non valida";
        }

        /* Numero di telefono cliente */
        if(!preg_match('/^(\+|00)[0-9]{10,15}+$/', $data["phone"])){
            self::$errors[] = "Hai inserito un numero di telefono non valido";
        }

        return count(self::$errors) == 0;
    }
}