<?php

namespace App\Http\Middleware;

use App\Exceptions\ErrorResponseException;
use App\Traits\ApiResponse;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class EnsureRoleIsValid
{
    use ApiResponse;

    /**
     * @throws ErrorResponseException
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = Auth::user()->loadMissing('role.permissions');
            $role = $user->role;
            $permissions = $role ? $role->permissions : null;
            $permissionsArray = $permissions ? $permissions->pluck('name')->toArray() : [];
            if (! in_array(Route::currentRouteName(), $permissionsArray)) {
                return $this->sendError('You do not have permission to access this page', Response::HTTP_FORBIDDEN);
            }

            return $next($request);
        } catch (Exception $e) {
            throw new ErrorResponseException();
        }
    }
}
