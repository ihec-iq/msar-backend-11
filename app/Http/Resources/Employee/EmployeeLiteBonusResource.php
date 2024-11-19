<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\Bonus\BonusDegreeStageResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Http\Resources\User\SectionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeLiteBonusResource extends JsonResource
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
            'Section' => new SectionResource($this->Section),
            'Type' => new EmployeeTypeResource($this->EmployeeType),
            'Position' => new EmployeePositionResource($this->EmployeePosition),
            'dateLastBonus' => $this->date_last_bonus,
            'dateNextBonus' => $this->date_next_bonus,
            'numberLastBonus' => $this->number_last_bonus,
            'BonusJobTitle' => new GeneralIdNameResource($this->BonusJobTitle),
            'BonusStudy' => new GeneralIdNameResource($this->BonusStudy),
            'DegreeStage' => new BonusDegreeStageResource($this->DegreeStage),
        ];
    }
}
