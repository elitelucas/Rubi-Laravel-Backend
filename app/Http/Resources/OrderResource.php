<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'client' => ClientResource::make($this->whenLoaded('client')),
            'words_qty' => $this->words_qty,
            'credit_qty' => $this->credit_qty,
            'storage_qty' => $this->storage_qty,
            'total' => $this->total
        ];
    }
}
