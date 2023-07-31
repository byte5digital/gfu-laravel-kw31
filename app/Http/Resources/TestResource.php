<?php

namespace App\Http\Resources;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Test $this */
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'user'=> new UserResource($this->user),
            'user_raw' => $this->user
        ];
    }
}
