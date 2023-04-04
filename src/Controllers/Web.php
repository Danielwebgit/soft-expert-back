<?php

namespace Src\Controllers;

use Gridonic\JsonResponse\SuccessJsonResponse;

class Web
{
    public function errorCode($data)
    {
        $response = new SuccessJsonResponse([ $data ]);
        $response->send();    
    }
}