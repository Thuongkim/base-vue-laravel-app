<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /** @OA\Schema(
     *     schema="UserCollection",
     *      type="object",
     *
     *      @OA\Property(
     *          property="data",
     *          type="array",
     *
     *          @OA\Items(ref="#/components/schemas/User")
     *      ),
     *
     *      @OA\Property(
     *          property="links",
     *          type="object",
     *          example={
     *              "first": "http://127.0.0.1:8000/api/users?page=1",
     *              "last": "http://127.0.0.1:8000/api/users?page=1",
     *              "prev": null,
     *              "next": null,
     *          },
     *      ),
     *       @OA\Property(
     *          property="meta",
     *          type="object",
     *          @OA\Property(
     *              property="current_page",
     *              type="integer",
     *              example=1
     *          ),
     *          @OA\Property(
     *              property="from",
     *              type="integer",
     *              example=1
     *          ),
     *          @OA\Property(
     *              property="last_page",
     *              type="integer",
     *              example=1
     *          ),
     *          @OA\Property(
     *              property="links",
     *              type="array",
     *
     *              @OA\Items(
     *                  type="object",
     *                  example={
     *                      "url": "http://127.0.0.1:8000/api/users?page=1",
     *                      "label": "http://127.0.0.1:8000/api/users?page=1",
     *                      "active": null,
     *                  },
     *              )
     *          ),
     *
     *          @OA\Property(
     *              property="path",
     *              type="string",
     *              example="http://127.0.0.1:8000/api/users"
     *          ),
     *          @OA\Property(
     *              property="per_page",
     *              type="integer",
     *              example=10
     *          ),
     *          @OA\Property(
     *              property="to",
     *              type="integer",
     *              example=10
     *          ),
     *          @OA\Property(
     *              property="total",
     *              type="integer",
     *              example=10
     *          ),
     *      ),
     * ),
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
