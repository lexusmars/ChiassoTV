<?php


class Banner
{
    private $id;
    private $img_name;
    private $link;
    private $start_date;
    private $end_date;
    private $created_at;
    private $type;
    private $client_id;

    function __construct(int $id, string $img_name, $link, $start_date, $end_date, $created_at, $type, $client_id)
    {
        $this->id = $id;
        $this->img_name = $img_name;
        $this->link = $link;
        $this->start_date = date_create_from_format("Y-m-d",$start_date);
        $this->end_date = date_create_from_format("Y-m-d",$end_date) ;
        $this->created_at = date_create_from_format("Y-m-d H:i:s",$created_at);
        $this->type = $type;
        $this->client_id = $client_id;
    }

    public function getPath(): string {
        return BANNERS_IMG_PATH . $this->getImgName();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getImgName(): string
    {
        return $this->img_name;
    }

    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }
}

class BannerValidator{

    public static function validatePastDateTime($date): bool{
        /* Check if date is in the past or not */
        return date_diff(new DateTime(),$date)->format("%a") >= '0' ? true : false;
    }

    public static function validateStartEndDate($start_date, $end_date): bool {
        /* Check if the start date is minor than the end date */
        return $start_date < $end_date;
    }

    public static function validateBannerImage($filename): bool{
        /* Check if the image selected exists */
        return file_exists(BANNERS_IMG_PATH . $filename);
    }

    public static function validateSubscriptionType(Subscription $type, DateTime $start_date, DateTime $end_date){
        $diff_days = $start_date->diff($end_date)->format("d");
        return $type->getDays() == $diff_days;
    }

    public static function validateLink($link){
        return filter_var($link, FILTER_VALIDATE_URL);
    }
}