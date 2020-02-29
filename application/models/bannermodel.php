<?php


class BannerModel
{
    private static $errors = array();

    public static function getBanners(): array
    {
        $result = DB::query("SELECT * FROM banner");
        return self::parseBanners($result);
    }

    public static function getBannersRandomOrder(): array{
        $result = DB::query("SELECT * FROM banner ORDER BY RAND()");
        return self::parseBanners($result);
    }

    public static function countBanners(): float {
        return (float) DB::query("SELECT count(*) FROM banner")[0]["count(*)"];
    }

    public static function calculateTotalEarnings(): int{
        return (int) DB::query("SELECT sum(subscription.cost) FROM banner INNER JOIN subscription ON banner.type=subscription.name")[0]["sum(subscription.cost)"];
    }

    public static function getAvailableBanners(): array{
        $result = DB::query("SELECT * FROM banner WHERE start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE()");
        return self::parseBanners($result);
    }

    private static function parseBanners($data)
    {
        $banners = array();
        foreach ($data as $row) {
            $banners[] = new Banner(
                $row["id"],
                $row["img_name"],
                $row["link"],
                $row["start_date"],
                $row["end_date"],
                $row["created_at"],
                $row["type"],
                $row["client_id"]
            );
        }

        return $banners;
    }


    public static function getBannerImages(): array
    {
        return glob(BANNERS_IMG_PATH . '*');
    }

    public static function delete($id)
    {
        return DB::delete("banner","id=%s", $id);
    }

    public static function add($data)
    {
        if (self::validate($data)) {
            $result = DB::insert('banner', array(
                'type' => $data["type"],
                'client_id' => $data["client_id"],
                'start_date' => $data["start_date"],
                'end_date' => $data["end_date"],
                'link' => $data["link"],
                'img_name' => $data["img_name"]
            ));

            return !$result ? array("C'è stato un problema durante l'inserimento dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        } else {
            return self::$errors;
        }
    }

    public static function update($data, $id)
    {
        if(self::validate($data)){
            $result = DB::update('banner', array(
                'type' => $data["type"],
                'client_id' => $data["client_id"],
                'start_date' => $data["start_date"],
                'end_date' => $data["end_date"],
                'link' => $data["link"],
                'img_name' => $data["img_name"]
            ));

            return !$result ? array("C'è stato un problema durante l'aggiornamento dei dati all'interno del 
                database. Se l'errore persiste contatta l'amministratore") : true;
        }
        else{
            return self::$errors;
        }
    }

    private static function validate(array $data): bool
    {
        // TODO: ADD type + client_id + subscription check

        self::$errors = [];

        /*
         *  Controlli date
        */

        // Create date object
        $start_date = date_create_from_format("Y-m-d", $data["start_date"]);
        $end_date = date_create_from_format("Y-m-d", $data["end_date"]);

        if (!BannerValidator::validatePastDateTime($start_date)) {
            self::$errors[] = "La data di inizio deve essere nel futuro";
        }
        if (!BannerValidator::validatePastDateTime($end_date)) {
            self::$errors[] = "La data di fine deve essere nel futuro";
        } else {
            if (!BannerValidator::validateStartEndDate($start_date, $end_date)) {
                self::$errors[] = "La data di inizio deve essere precedente a quella di fine";
            }
        }


        // Validazione link (se immesso)
        if (strlen($data["link"]) > 0) {
            if (!BannerValidator::validateLink($data["link"])) {
                self::$errors[] = "Il link inserito non è valido";
            }
        } else {
            // Non è stato inserito nessun link
            $data["link"] = null;
        }

        return count(self::$errors) == 0;
    }
}