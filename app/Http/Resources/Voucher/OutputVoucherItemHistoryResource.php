<?php

namespace App\Http\Resources\Voucher;

use App\Http\Resources\Item\ItemResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutputVoucherItemHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'OutputVoucherId' => $this->Output_voucher_id,
            'item' => new ItemResource($this->Item),
            'count' => $this->count,
            'price' => $this->price / 100,
            'value' => ($this->price * $this->count) / 100,
            'Histories' => VoucherItemHistoryResource::collection($this->Histories),
        ];
    }
}
