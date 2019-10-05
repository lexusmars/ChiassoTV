<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 28.09.2019
 * Time: 15:05
 */

class LoginModel
{
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function auth(){
        $result = DB::query("SELECT * FROM user WHERE username=%s", $this->username);

        if(count($result) > 0){
            var_dump($result);
            if(password_verify($this->password, $result[0]["password"])){
                return new User($result[0]["username"], $result[0]["name"], $result[0]["surname"]);
            }
        }
        return false;
    }
}