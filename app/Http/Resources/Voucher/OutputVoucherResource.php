<?php

namespace App\Http\Resources\Voucher;

use App\Http\Resources\Employee\EmployeeBigLiteResource;
use App\Http\Resources\Stock\StockResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutputVoucherResource extends JsonResource
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
            'numberBill'=> $this->number_bill,
            'dateBill'=> $this->date_bill,
            'Items' => OutputVoucherItemResource::collection($this->Items),
            'signaturePerson' => $this->signature_person,
            'Employee' => new EmployeeBigLiteResource($this->Employee),
            'Stock' => new StockResource($this->Stock),
            'itemsCount' => count($this->Items),
        ];
    }
}
