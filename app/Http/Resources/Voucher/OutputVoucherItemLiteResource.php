<?php

namespace App\Http\Resources\Voucher;

use App\Http\Resources\Item\ItemResource;
use App\Http\Resources\Stock\StockResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutputVoucherItemLiteResource extends JsonResource
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
            'outputVoucherId' => $this->output_voucher_id,
            'itemId' => $this->item_id,
            // 'item' => new ItemResource($this->Item),
            // 'stockId' => $this->stock_id,
            // 'stock' => new StockResource($this->Stock),
            // 'description' => $this->description,
            'count' => $this->count,
            'price' => $this->price / 100,
            'value' => ($this->price * $this->count) / 100,
            'notes' => $this->notes,
        ];
    }
}
