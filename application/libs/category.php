<?php

class Category
{
    public function __construct($id, $name, $description, $num_episodes, $created_at, $last_edit_at, $img_path)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->num_episodes = $num_episodes;
        $this->created_at = $created_at;
        $this->last_edit_at = $last_edit_at;
        $this->img_path = $img_path;
    }

    public function getCategoryId(){
        return $this->id;
    }

    public function getCategoryName(){
        return $this->name;
    }

    public function getCategoryDescription(){
        return $this->description;
    }

    public function getCategoryNumEpisodes(){
        return $this->num_episodes;
    }

    public function getCategoryCreationDate(){
        return $this->created_at;
    }

    public function getCategoryLastEditDate(){
        return $this->last_edit_at;
    }

    public function getCategoryImagePath(){
        return $this->img_path;
    }
}