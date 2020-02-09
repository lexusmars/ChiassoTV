<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 06.10.2019
 * Time: 15:34
 */

class Episode
{
    public function __construct(int $episode_number, int $category_id, string $link,
                                string $title, string $description, string $created_by_key, string $created_on)
    {
        $this->episode_number = $episode_number;
        $this->category_id = $category_id;
        $this->link = $link;
        $this->title = $title;
        $this->description = $description;
        $this->created_by_key = $created_by_key;
        $this->created_on = $created_on;
    }

    /**
     * @return DateTime
     */
    public function getCreationDatetime(): DateTime
    {
        return date_create_from_format("Y-m-d H:i:s", $this->created_on);
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category{
        return CategoriesModel::getCategory(self::getCategoryId());
    }

    /**
     * @return string
     */
    public function getCreatedBy(): string
    {
        return $this->created_by_key;
    }

    /*
     * TODO: FINISH THIS METHOD
    public function getCreatedByUser(): User{

    }
    */

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getEpisodeIdentifierNumber(): string{
        return $this->episode_number;
    }
}