<?php

namespace App\Http\Resources\Voucher;

use App\Http\Resources\Employee\EmployeeLiteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DirectVoucherResource extends JsonResource
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
            'number' => $this->number,
            'date' => $this->date,
            'notes' => $this->notes,
            'Items' => DirectVoucherItemResource::collection($this->Items),
            'signaturePerson' => $this->signature_person,
            'Employee' => new EmployeeLiteResource($this->Employee),
            'itemsCount' => count($this->Items),
        ];
    }
}
