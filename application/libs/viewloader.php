<?php

class ViewLoader
{
    public static function load($template, $args=null)
    {
        if(is_array($args)){
            foreach($args as $name=>$value){
                $$name = $value;
            }
        }
        require_once DIR . "application/views/". $template . '.php';
    }

    public static function loadFile($path){
        header('Content-Type: text/plain');
        echo file_get_contents( DIR . "application/" . $path);
    }
}
