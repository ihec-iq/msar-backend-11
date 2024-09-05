<?php

namespace App\Http\Resources\Store;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreSummationResource extends JsonResource
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
            'code' => $this->code,
            'description' => $this->itemDescription,
            'stockName' => $this->stockName,
            'categoryName' => $this->itemCategoryName,
            'price' => $this->price / 100,
            'in' => $this->inValue,
            'out' => $this->outValue,
            'reIn' => $this->reInValue,
            'reOut' => $this->reOutValue
        ];
    }
}
