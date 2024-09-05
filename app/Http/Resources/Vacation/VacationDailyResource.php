<?php

namespace App\Http\Resources\Vacation;

use App\Http\Resources\Employee\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacationDailyResource extends JsonResource
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
            'Vacation' => new VacationResource($this->Vacation),
            'EmployeeAlter' => new EmployeeResource($this->EmployeeAlter),
            'Reason' => new VacationReasonResource($this->Reason),
            'dayFrom' => $this->day_from,
            'dayTo' => $this->day_to,
            'record' => $this->record,
            'createdAt'=> $this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
