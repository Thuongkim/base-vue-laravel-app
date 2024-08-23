<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorResponseException;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Class UsersController.
 */
class UsersController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     tags={"user"},
     *     summary="Get list user",
     *     description="Returns list user.",
     *     operationId="getListUser",
     *
     *     @OA\Parameter(ref="#/components/parameters/name_param"),
     *     @OA\Parameter(ref="#/components/parameters/email_param"),
     *     @OA\Parameter(ref="#/components/parameters/created_at_start_param"),
     *     @OA\Parameter(ref="#/components/parameters/created_at_end_param"),
     *     @OA\Parameter(ref="#/components/parameters/id_param"),
     *     @OA\Parameter(ref="#/components/parameters/order_by_param"),
     *     @OA\Parameter(ref="#/components/parameters/order_type_param"),
     *     @OA\Parameter(ref="#/components/parameters/page_param"),
     *
     *     @OA\Response(
     *         ref="#/components/responses/bad_request_response",
     *         response=400
     *     ),
     *     @OA\Response(
     *         ref="#/components/responses/unauthorized_response",
     *         response=401
     *     ),
     *     @OA\Response(
     *         response=200,
     *         ref="#/components/responses/user_list_response",
     *      ),
     * )
     *
     * @throws ErrorResponseException
     */
    public function index(Request $request)
    {
        try {
            $users = $this->userService->getUsers($request->all());

            return new UserCollection($users);
        } catch (Exception $e) {
            throw new ErrorResponseException();
        }
    }

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *    tags={"user"},
     *     summary="Get user by user id",
     *     operationId="getUserById",
     *     description="Returns a single user.",
     *
     *     @OA\Parameter(ref="#/components/parameters/id_path_param"),
     *
     *     @OA\Response(
     *         response=200,
     *         ref="#/components/responses/user_detail_response",
     *     ),
     *     @OA\Response(
     *         ref="#/components/responses/bad_request_response",
     *         response=400
     *     ),
     *      @OA\Response(
     *          ref="#/components/responses/not_found_response",
     *          response=404
     *      ),
     *     @OA\Response(
     *         ref="#/components/responses/unauthorized_response",
     *         response=401
     *     ),
     * )
     *
     * @throws ErrorResponseException
     */
    public function show($id)
    {
        try {
            $user = $this->userService->getUser($id);
            if (! $user) {
                return $this->sendError(Response::$statusTexts[ResponseAlias::HTTP_NOT_FOUND], ResponseAlias::HTTP_NOT_FOUND);
            }

            return new UserResource($user);
        } catch (Exception $e) {
            throw new ErrorResponseException();
        }
    }

    /**
     * @OA\Put(
     *     path="/api/users/{id}",
     *    tags={"user"},
     *     summary="Update user by user id",
     *
     *     @OA\Parameter(ref="#/components/parameters/xsrf_token_param"),
     *     @OA\Parameter(ref="#/components/parameters/id_path_param"),
     *     @OA\Parameter(ref="#/components/parameters/name_required_param"),
     *     @OA\Parameter(ref="#/components/parameters/email_required_param"),
     *
     *     @OA\Response(
     *         response=200,
     *         ref="#/components/responses/success_response",
     *     ),
     *      @OA\Response(
     *          ref="#/components/responses/user_edit_error_response",
     *          response=422
     *      ),
     *     @OA\Response(
     *         ref="#/components/responses/bad_request_response",
     *         response=400
     *     ),
     *      @OA\Response(
     *          ref="#/components/responses/not_found_response",
     *          response=404
     *      ),
     *     @OA\Response(
     *         ref="#/components/responses/unauthorized_response",
     *         response=401
     *     ),
     * )
     *
     * @throws ErrorResponseException
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $user = $this->userService->getUser($id);
            if (! $user) {
                return $this->sendError(Response::$statusTexts[ResponseAlias::HTTP_NOT_FOUND], ResponseAlias::HTTP_NOT_FOUND);
            }
            $userResponse = $this->userService->update($id, $request->validated());
            if (isset($userResponse['error'])) {
                return $this->sendError($userResponse['error'], ResponseAlias::HTTP_BAD_REQUEST);
            }

            return $this->sendResponse(null, ResponseAlias::HTTP_OK, Response::$statusTexts[ResponseAlias::HTTP_OK]);
        } catch (Exception $e) {
            throw new ErrorResponseException();
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/users/{id}",
     *    tags={"user"},
     *     summary="Delete user by user id",
     *
     *     @OA\Parameter(ref="#/components/parameters/xsrf_token_param"),
     *     @OA\Parameter(ref="#/components/parameters/id_path_param"),
     *
     *     @OA\Response(
     *         response=200,
     *         ref="#/components/responses/success_response",
     *     ),
     *     @OA\Response(
     *         ref="#/components/responses/bad_request_response",
     *         response=400
     *     ),
     *      @OA\Response(
     *          ref="#/components/responses/not_found_response",
     *          response=404
     *      ),
     *     @OA\Response(
     *         ref="#/components/responses/unauthorized_response",
     *         response=401
     *     ),
     * )
     *
     * @throws ErrorResponseException
     */
    public function destroy($id)
    {
        try {
            $user = $this->userService->getUser($id);
            if (! $user) {
                return $this->sendError(Response::$statusTexts[ResponseAlias::HTTP_NOT_FOUND], ResponseAlias::HTTP_NOT_FOUND);
            }
            $this->userService->delete($id);

            return $this->sendResponse(null, ResponseAlias::HTTP_OK, Response::$statusTexts[ResponseAlias::HTTP_OK]);
        } catch (Exception $e) {
            throw new ErrorResponseException();
        }
    }
}
