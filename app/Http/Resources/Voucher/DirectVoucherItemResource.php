<?php

namespace App\Http\Resources\Voucher;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DirectVoucherItemResource extends JsonResource
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
            'directVoucherId' => $this->direct_voucher_id,
            //'inputVoucherItem' => new InputVoucherItemLiteResource($this->InputVoucherItem),
            'Item' => $this->Item,
            'description' => $this->description,
            'count' => $this->count,
            'price' => $this->price / 100,
            'value' => ($this->price * $this->count) / 100,
            'notes' => $this->notes,
        ];
    }
}
