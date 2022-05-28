<?php

include('bootstrap.php');

use Validator\RequestValidator;
use Util\RoutesUtil;

try
{
    $validator = new RequestValidator(RoutesUtil::getRoutes());
}
catch (Exception $exception)
{
    echo $exception->getMessage();
}