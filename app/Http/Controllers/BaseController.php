<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests;

    /**
     * Formatea y devuelve una respuesta JSON estándar.
     */
    public function sendResponse($result, $message, $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $result
        ], $code);
    }

    /**
     * Respuesta de error estándar.
     */
    public function sendError($error, $errorMessages = [], $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $error,
            'errors' => $errorMessages
        ], $code);
    }
    
}
