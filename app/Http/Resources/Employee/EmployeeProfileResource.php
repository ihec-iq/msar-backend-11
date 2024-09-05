<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\User\SectionResource;
use App\Http\Resources\Vacation\VacationDailyResource;
use App\Http\Resources\Vacation\VacationSickResource;
use App\Http\Resources\Vacation\VacationTimeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeProfileResource extends JsonResource
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
            'Section' => new SectionResource($this->section),
            'dateWork' => $this->date_work,
            'number' => $this->number,
            'idCard' => $this->id_card,
            'Type' => new EmployeeTypeResource($this->EmployeeType),
            'Position' => new EmployeePositionResource($this->EmployeePosition),
            'initVacation' => $this->init_vacation,
            'takeVacation' => $this->take_vacation,
            'initVacationSick' => $this->init_vacation_sick,
            'takeVacationSick' => $this->take_vacation_sick,
            'vacationDailys' => VacationDailyResource::collection($this->vacationDailys),
            'vacationSicks' => VacationTimeResource::collection($this->vacationSicks),
            'vacationTimes' => VacationSickResource::collection($this->vacationTimes),
        ];
    }
}
