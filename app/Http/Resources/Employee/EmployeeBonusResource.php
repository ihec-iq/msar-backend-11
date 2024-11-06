<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\Bonus\BonusDegreeStageResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Http\Resources\User\SectionResource;
use App\Http\Resources\User\UserLiteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeBonusResource extends JsonResource
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
            'dateLastBonus' => $this->date_last_bonus,
            'dateNextWorth' => $this->date_next_bonus,
            'difNextDate' => $this->getDifNextDateAttribute(), // Updated to use the new method
            'numberLastBonus' => $this->number_last_bonus,
            'employeePosition' => $this->EmployeePosition->name,
            'employeeCenter' => $this->EmployeeCenter->name,
            'employeeType' => $this->EmployeeType->name,
            'bonusJobTitle' => $this->BonusJobTitle->name,
            'bonusStudy' => $this->BonusStudy->name,
            'bonusDegreeStage' => 'الدرجة ' . $this->BonusDegreeStage->Degree->name . ' المرحلة ' . $this->BonusDegreeStage->Stage->name,
        ];
    }

    /**
     * Get the difference to the next date.
     *
     * @return int
     */
    public function getDifNextDateAttribute(): int
    {
        // Assuming you want to calculate the difference in days
        return now()->diffInDays($this->date_next_bonus);
    }
}
