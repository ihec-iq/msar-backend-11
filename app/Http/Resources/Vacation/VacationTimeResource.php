<?php

namespace App\Http\Resources\Vacation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacationTimeResource extends JsonResource
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
            'Reason' => new VacationReasonResource($this->Reason),
            'date' => $this->date,
            'timeFrom' => $this->time_from,
            'timeTo' => $this->time_to,
            'record' => $this->record,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
