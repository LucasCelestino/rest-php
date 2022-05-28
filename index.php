<?php

include('bootstrap.php');

use Validator\RequestValidator;
use Util\RoutesUtil;

try
{
    $Requestvalidator = new RequestValidator(RoutesUtil::getRoutes());

    $return = $Requestvalidator->processRequest();
}
catch (Exception $exception)
{
    echo $exception->getMessage();
}