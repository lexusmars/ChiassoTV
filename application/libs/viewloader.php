<?php

class ViewLoader
{
    public const CONTENT_TYPE_TEXT = "text/plain";
    public const CONTENT_TYPE_XML = "application/xml";

    public static function load($template, $args=null)
    {
        if(is_array($args)){
            foreach($args as $name=>$value){
                $$name = $value;
            }
        }
        require_once DIR . "application/views/". $template . '.php';
    }

    public static function loadFile($path, $content_type=ViewLoader::CONTENT_TYPE_TEXT){
        header("Content-Type: $content_type");
        echo file_get_contents( DIR . "application/" . $path);
    }
}
