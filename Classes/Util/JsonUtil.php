<?php

namespace Util;

use InvalidArgumentException;
use JsonException;

class JsonUtil
{
    public static function processJsonBodyRequest()
    {
        try
        {
            $postJson = json_decode(file_get_contents('http://input'), true);
        }
        catch(JsonException $exception)
        {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_JSON_EMPTY);
        }

        if(is_array($postJson) && $postJson > 0)
        {
            return $postJson;
        }
    }
}