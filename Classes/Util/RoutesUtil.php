<?php

namespace Util;

class RoutesUtil
{
    /**
     * @return array
     */
    public static function getRoutes(): array
    {
        $urls = self::getUrls();
        
        $request = [];
        $request['route'] = strtoupper($urls[0] );
        $request['resource'] = $urls[1];
        $request['id'] = $urls[2];
        $request['method'] = $_SERVER['REQUEST_METHOD'];

        return $request;
    }

    public static function getUrls()
    {
        $uri = str_replace('/' . DIR_PROJECT, '', $_SERVER['REQUEST_URI']);
        return explode('/', trim($uri, '/'));
    }
}
