<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\Bonus\BonusDegreeStageResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Http\Resources\User\SectionResource;
use App\Http\Resources\User\UserLiteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'dateWork' => $this->date_work,
            //'UserId' => $this->user_id,
            //'UserName' => $this->User->name,
            //'SectionId' => $this->section_id,
            //'SectionName' => $this->Section->name,
            //'PositionId' => $this->employee_position_id,
            //'PositionName' => $this->EmployeePosition->name,
            //'TypeId' => $this->employee_type_id,
            //'TypeName' => $this->EmployeeType->name,
            'User' => new UserLiteResource($this->User),
            'Section' => new SectionResource($this->Section),
            'isMoveSection' => $this->is_move_section,
            'MoveSection' => new SectionResource($this->MoveSection),
            'EmployeePosition' => new EmployeePositionResource($this->EmployeePosition),
            'EmployeeCenter' => new EmployeeCenterResource($this->EmployeeCenter),
            'EmployeeType' => new EmployeeTypeResource($this->EmployeeType),
            'countItems' => count($this->outputVouchers),
            'Items' => $this->outputVouchers,
            'SumItems' => $this->outputVouchers,
            'number' => $this->number,
            'idCard' => $this->id_card,
            'telegramId' => $this->telegram,
            'dateLastBonus' => $this->date_last_bonus,
            'dateNextBonus' => $this->date_next_bonus,
            'numberLastBonus' => $this->number_last_bonus,
            'BonusJobTitle' => new GeneralIdNameResource($this->BonusJobTitle),
            'BonusStudy' => new GeneralIdNameResource($this->BonusStudy),
            'BonusDegreeStage' => new BonusDegreeStageResource($this->BonusDegreeStage),
        ];
    }
}
