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

    function __construct(int $id, string $img_name, string $link, $start_date, $end_date, $created_at, $type, $client_id)
    {
        $this->id = $id;
        $this->img_name = $img_name;
        $this->link = $link;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->created_at = $created_at;
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

    /**
     * @return string
     */
    public function getLink(): string
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