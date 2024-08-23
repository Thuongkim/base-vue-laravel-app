<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Admin API", version="0.1")
 */
class Controller extends BaseController
{
    use ApiResponse, AuthorizesRequests, ValidatesRequests;
}
