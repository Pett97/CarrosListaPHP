<?php

namespace Core\Constants;

class Constants{
    public static function rootPath(){
        return dirname(dirname(__DIR__));
    }

    public static function databasePath(){
        return self::rootPath(). "/database/";
    }
}



