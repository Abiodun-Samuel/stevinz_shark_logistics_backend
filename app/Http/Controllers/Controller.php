<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function successResponse($data = [], $message = '', $code = 200): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function errorResponse($data = null, $errorMessages, $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $errorMessages,
            'data' => $data,
        ];

        return response()->json($response, $code);
    }
}
