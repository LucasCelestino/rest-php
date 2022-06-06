<?php

include('bootstrap.php');

use Util\ConstantesGenericasUtil;
use Validator\RequestValidator;
use Util\RoutesUtil;

try
{
    $Requestvalidator = new RequestValidator(RoutesUtil::getRoutes());

    $return = $Requestvalidator->processRequest();
}
catch (Exception $exception)
{
    echo json_encode([ConstantesGenericasUtil::TYPE => ConstantesGenericasUtil::TYPE_ERROR,
    ConstantesGenericasUtil::RESPONSE => utf8_encode($exception->getMessage())]);
}