<?php

namespace App\Http\Resources\Voucher;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InputVoucherItemVSelectResource extends JsonResource
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
            'inputVoucherId' => 0,
            'Item' => [
                'id' => $this->itemId,
                'name' => $this->itemName,
                'code' => $this->code,
                'description' => $this->ItemDescription,
                'Category' => [
                    'id' => $this->itemCategoryId,
                    'name' => $this->itemCategoryName,
                ],
                'measuringUnit' => '',
            ],
            'Stock' => [
                'id' => $this->stockId,
                'name' => $this->stockName,
            ],
            'description' => $this->description,
            'price' => $this->price / 100,
            'count' => $this->inValue - $this->outValue,
            'value' => ($this->price * ($this->inValue - $this->outValue)) / 100,
            'inValue' => $this->inValue,
            'outValue' => $this->outValue,
            'notes' => $this->notes,
            //'countOutputItems' => $this->inValue - $this->outValue,
        ];
    }
}
