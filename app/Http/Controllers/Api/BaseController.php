<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\JsonResponse;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    /**
     * success response method.
     */
    public function sendResponse($result = null, string $message = null): JsonResponse
    {
        return ResponseBuilder::asSuccess(Response::HTTP_OK)
               ->withData($result)
               ->withMessage($message)
               ->withHttpCode(Response::HTTP_OK)
               ->build();
    }


    /**
     * return error response.
     */
    public function sendError($errorMessages = [], int $code = Response::HTTP_NOT_FOUND): JsonResponse
    {
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return ResponseBuilder::asError($code)
               ->withData($errorMessages)
               ->withHttpCode($code)
               ->build();
    }
}