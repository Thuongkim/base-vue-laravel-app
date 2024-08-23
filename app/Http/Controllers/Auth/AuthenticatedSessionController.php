<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * @OA\Post(
     *     path="/login",
     *     tags={"auth"},
     *     summary="Logs user into system",
     *     description="Login api.",
     *     operationId="loginUser",
     *
     *      @OA\Parameter(
     *          name="X-XSRF-TOKEN",
     *          in="header",
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="The user name for login",
     *
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=204,
     *         description="successful operation",
     *
     *         @OA\JsonContent(
     *         ),
     *     ),
     *
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Content",
     *
     *         @OA\JsonContent(
     *              type="object",
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="The email field is required. (and 1 more error)"
     *              ),
     *              @OA\Property(
     *                  property="errors",
     *                  type="object",
     *                  example={
     *                      "email": "The email field is required.",
     *                      "password": "The password field is required.",
     *                  },
     *              ),
     *         )
     *     )
     * )
     */
    public function store(LoginRequest $request): Response
    {
        $request->authenticate();

        $request->session()->regenerate();

        return response()->noContent();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
