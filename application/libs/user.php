<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 28.09.2019
 * Time: 16:20
 */

class User
{
    public function __construct($username, $name, $surname)
    {
        $this->username = $username;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }
}