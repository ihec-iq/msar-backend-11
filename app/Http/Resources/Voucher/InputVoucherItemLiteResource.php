<?php

namespace App\Http\Resources\Voucher;

use App\Http\Resources\Item\ItemResource;
use App\Http\Resources\Stock\StockResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InputVoucherItemLiteResource extends JsonResource
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
            'inputVoucherId' => $this->input_voucher_id,
            'Item' => new ItemResource($this->Item),
            'Stock' => new StockResource($this->Stock),
            'description' => $this->description,
            'count' => $this->count,
            'price' => $this->price / 100,
            'value' => ($this->price * $this->count) / 100,
            'notes' => $this->notes,
        ];
    }
}
