<?php

namespace Validator;

use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

class RequestValidator
{

    private $request;
    private $dataRequest;

    private const GET = 'GET';
    private const DELETE = 'DELETE';

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function processRequest()
    {
        $return = utf8_encode(ConstantesGenericasUtil::MSG_ERROR_TYPE_ROUTE);

        if(in_array($this->request['method'], ConstantesGenericasUtil::TYPE_REQUEST, true))
        {
            $return = $this->redirectRequest();
        }

        var_dump($return);

        return $return;
    }

    private function redirectRequest()
    {
        if($this->request['method'] != self::GET && $this->request['method'] != self::DELETE)
        {
            $this->dataRequest = JsonUtil::processJsonBodyRequest();
        }
    }
}