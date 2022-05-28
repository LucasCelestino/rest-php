<?php

namespace Util;

class RoutesUtil
{
    public static function getRoutes()
    {
        $urls = self::getUrls();
        var_dump($urls);
    }

    public static function getUrls()
    {
        $uri = str_replace('/'.DIR_PROJECT, '', $_SERVER['REQUEST_URI']);
        return explode('/', trim($uri, '/'));
    }
}