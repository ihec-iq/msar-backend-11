<?php

namespace App\Http\Resources\Employee;
 
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
            'numberLastBonus' => $this->number_last_bonus,
            'dateLastBonus' => $this->date_last_bonus,
            'dateNextBonus' => $this->date_next_bonus,
            'difNextBonusDate' => $this->getDifNextBonusDateAttribute(),
            'numberLastPromotion' => $this->number_last_promotion,
            'dateLastPromotion' => $this->date_last_promotion,
            'dateNextPromotion' => $this->date_next_promotion,
            'difNextPromotionDate' => $this->getDifNextPromotionDateAttribute(),
            'employeePosition' => $this->EmployeePosition->name,
            'employeeCenter' => $this->EmployeeCenter->name,
            'employeeType' => $this->EmployeeType->name,
            'bonusJobTitle' => $this->BonusJobTitle->name,
            'bonusStudy' => $this->BonusStudy->name,
            'degreeStage' => 'الدرجة ' . $this->DegreeStage->Degree->name . ' المرحلة ' . $this->DegreeStage->Stage->name,
        ];
    }

    /**
     * Get the difference to the next date.
     *
     * @return int
     */
    public function getDifNextBonusDateAttribute(): int
    {
        // Assuming you want to calculate the difference in days
        return now()->diffInDays($this->date_next_bonus);
    }
    public function getDifNextPromotionDateAttribute(): int
    {
        // Assuming you want to calculate the difference in days
        return now()->diffInDays($this->date_next_promotion);
    }
}
