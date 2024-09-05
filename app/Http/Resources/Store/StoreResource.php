<?php

namespace App\Http\Resources\Store;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'itemId' => $this->itemId,
            'itemName' => $this->itemName,
            'description' => $this->description,
            'stockName' => $this->stockName,
            'price' => $this->price / 100,
            'in' => $this->in,
            'out' => $this->out,
            'count' => $this->count,
        ];
    }
}
