<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\User\SectionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeLiteResource extends JsonResource
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
            'isPerson' => $this->is_person,
            'telegramId' => $this->telegram,
            'Section' => new SectionResource($this->Section),
            'MoveSection' => new SectionResource($this->MoveSection),
            'isMoveSection' => $this->is_move_section,
            'Type' => new EmployeeTypeResource($this->EmployeeType),
            'Position' => new EmployeePositionResource($this->EmployeePosition),
        ];
    }
}
