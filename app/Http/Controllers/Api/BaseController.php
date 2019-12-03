<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        return ResponseBuilder::asSuccess()
               ->withData($result)
               ->withHttpCode(Response::HTTP_OK)
               ->withMessage($message)
               ->build();
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = Response::HTTP_NOT_FOUND)
    {
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return ResponseBuilder::asError()
               ->withData($errorMessages)
               ->withHttpCode($code)
               ->withMessage($message)
               ->build();
    }
}