<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

trait JResponse
{
    /**
     * Success response
     * @param string $message
     * @param array|Collection $data
     * @param array $extra
     * @return JsonResponse
     */
    protected function successResponse(string $message = '', $data = [], array $extra = []): JsonResponse
    {
        $response = [
            'code' => 200,
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'extra' => $extra,
            'error' => false
        ];

        Log::info(request()->ip() . " " . request()->getRequestUri(), ['response' => $response]);

        return response()->json($response, $response['code']);
    }

    /**
     * Error response
     * @param string $message
     * @param int $code
     * @param array $data
     * @return JsonResponse
     */
    protected function errorResponse(string $message = '', int $code = 400, array $data = []): JsonResponse
    {
        $response = [
            'code' => $code == 0 ? 500 : $code,
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'error' => true
        ];

        Log::error(request()->ip() . " " . request()->getRequestUri(), ['response' => $response]);

        return response()->json($response, $response['code']);
    }

    /**
     * Bad request response
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    protected function errorBadRequestResponse(string $message = 'BAD_REQUEST', int $code = 400): JsonResponse
    {
        $response = [
            'code' => $code,
            'status' => 'error',
            'message' => $message,
            'error' => true,
            'error_type' => 'bad_request'
        ];

        return response()->json($response, $response['code']);
    }
}
