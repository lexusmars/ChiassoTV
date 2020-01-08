<?php


class SubscriptionModel
{
    public static function getSubscriptionTypes() : array{
        $result = DB::query("SELECT DISTINCT * FROM subscription");
        return self::parseSubscriptions($result);
    }

    private static function parseSubscriptions($data){
        $types = array();

        foreach($data as $row){
            $types[] = new Subscription(
                $row["name"],
                $row["n_days"],
                $row["cost"]
            );
        }
        return $types;
    }
}