<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ApiResponse
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($data = null, int $code = ResponseAlias::HTTP_OK, ?string $message = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError(string $message, int $code, $data = null)
    {
        return response()->json([
            'error' => $message,
            'data' => $data,
        ], $code);
    }
}
