<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @OA\Schema(
     *     schema="User",
     *     type="object",
     *
     *     @OA\Property(property="id", type="integer", example=36),
     *     @OA\Property(property="name", type="string", example="ffdfd"),
     *     @OA\Property(property="email", type="string", format="email", example="example9898@gmail.com"),
     *
     * )
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
