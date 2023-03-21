<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ResponseFormatter
{
    protected static $response = [
        'meta' => [
            'code' => Response::HTTP_OK,
            'status' => 'success',
            'message' => null,
        ],
        'data' => null,
    ];

    public static function success($data = null, $message = null): JsonResponse
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function error($data = null, $message = null, $code = 400): JsonResponse
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
