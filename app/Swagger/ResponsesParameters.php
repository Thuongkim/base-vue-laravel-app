<?php

namespace App\Swagger;

class ResponsesParameters
{
    /**
     *     @OA\Parameter(
     *            parameter="xsrf_token_param",
     *            name="X-XSRF-TOKEN",
     *            in="header",
     *            required=true,
     *
     *            @OA\Schema(
     *                type="string"
     *            )
     *     ),
     *
     *     @OA\Parameter(
     *           parameter="name_param",
     *           name="name",
     *           in="query",
     *
     *           @OA\Schema(
     *               type="string"
     *           )
     *     ),
     *
     *     @OA\Parameter(
     *           parameter="name_required_param",
     *           name="name",
     *           in="query",
     *           required=true,
     *
     *           @OA\Schema(
     *               type="string"
     *           )
     *     ),
     *
     *     @OA\Parameter(
     *          parameter="email_required_param",
     *          name="email",
     *          in="query",
     *          required=true,
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *     @OA\Parameter(
     *          parameter="email_param",
     *          name="email",
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *          @OA\Parameter(
     *              parameter="order_by_param",
     *              name="order_by",
     *              in="query",
     *
     *              @OA\Schema(
     *                  type="string"
     *              )
     *          ),
     *
     *          @OA\Parameter(
     *               parameter="order_type_param",
     *               name="order_type",
     *               in="query",
     *
     *               @OA\Schema(
     *                   type="string"
     *               )
     *           ),
     *
     *          @OA\Parameter(
     *                parameter="page_param",
     *                name="page",
     *                in="query",
     *
     *                @OA\Schema(
     *                    type="string"
     *                )
     *            ),
     *
     *          @OA\Parameter(
     *              parameter="id_param",
     *              name="id",
     *              in="query",
     *
     *              @OA\Schema(
     *                  type="integer"
     *              )
     *          ),
     *
     *          @OA\Parameter(
     *                parameter="created_at_start_param",
     *                name="created_at_start",
     *                in="query",
     *
     *                @OA\Schema(
     *                    type="date"
     *                )
     *            ),
     *
     *          @OA\Parameter(
     *                parameter="created_at_end_param",
     *                name="created_at_end",
     *                in="query",
     *
     *                @OA\Schema(
     *                    type="date"
     *                )
     *            ),
     *
     *      @OA\Parameter(
     *          parameter="id_path_param",
     *          name="id",
     *          in="path",
     *          required=true,
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *       @OA\Response(
     *          response="bad_request_response",
     *          description="Bad Request",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseException"),
     *      ),
     *
     *      @OA\Response(
     *          response="unauthorized_response",
     *          description="Unauthorized",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="error",
     *                  type="string",
     *                  example="Unauthenticated"
     *              ),
     *          ),
     *      ),
     *
     *      @OA\Response(
     *          response="success_response",
     *          description="successful operation",
     *
     *          @OA\JsonContent(
     *                type="object",
     *
     *               @OA\Property(property="message", type="string", example="OK"),
     *               @OA\Property(property="data", example="null"),
     *          ),
     *      ),
     *
     *      @OA\Response(
     *           response="not_found_response",
     *           description="Not Found Request",
     *
     *        @OA\JsonContent(
     *
     *           @OA\Property(
     *               property="error",
     *               type="string",
     *               example="Not Found"
     *           ),
     *           @OA\Property(
     *               property="data",
     *               example=null
     *           ),
     *         )
     *       ),
     *
     *      @OA\Response(
     *           response="user_list_response",
     *           description="successful operation",
     *
     *           @OA\JsonContent(ref="#/components/schemas/UserCollection")
     *       ),
     *
     *      @OA\Response(
     *          response="user_detail_response",
     *          description="successful operation",
     *
     *           @OA\JsonContent(
     *                 type="object",
     *
     *                 @OA\Property(property="data", ref="#/components/schemas/User"),
     *           ),
     *      ),
     *
     *      @OA\Response(
     *          response="user_edit_error_response",
     *          description="Validation error",
     *
     *           @OA\JsonContent(
     *               type="object",
     *
     *               @OA\Property(property="message", type="string", example="The given data was invalid."),
     *               @OA\Property(property="errors", type="object",
     *                   @OA\Property(property="name", type="array", @OA\Items(type="string", example="The name field is required.")),
     *                   @OA\Property(property="email", type="array", @OA\Items(type="string", example="The email field is required.")),
     *               ),
     *           ),
     *      ),
     */
    public function defineResponsesParameters()
    {
    }
}
