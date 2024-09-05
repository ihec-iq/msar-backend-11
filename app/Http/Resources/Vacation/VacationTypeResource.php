<?php

namespace App\Http\Resources\Vacation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacationTypeResource extends JsonResource
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
            'name' => $this->name,
            'daysPerYear' => $this->days_per_year,
        ];
    }
}
