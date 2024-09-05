<?php

namespace App\Http\Resources\Vacation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacationSickResource extends JsonResource
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
            'dayFrom' => $this->day_from,
            'dayTo' => $this->day_to,
            'record' => $this->record,
            'createdAt'=> $this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
