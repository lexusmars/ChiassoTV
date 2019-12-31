<?php


class BannerModel
{

    public static function getBanners(): array{
        $result = DB::query("SELECT * FROM banner");
        return self::parseBanners($result);
    }

    private static function parseBanners($data){
        $banners = array();

        foreach ($data as $row) {
            $banners[] = new Banner(
                $data["id"],
                $data["img_name"],
                $data["link"],
                $data["start_date"],
                $data["end_date"],
                $data["created_at"],
                $data["type"],
                $data["client_id"]
            );
        }

        return $banners;
    }
}