<?php
namespace utils;
class Render{
    public static function view($get){
        ob_start();
        include "view/{$get}.php";
        $content = ob_get_clean();
        $layout =file_get_contents("view/layout.html");
        echo str_replace('[CONTENT]', $content, $layout);
    }
}