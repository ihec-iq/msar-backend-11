<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\Bonus\BonusResource;
use App\Http\Resources\Bonus\BonusWithoutEmployeeResource;
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
        $lastBonus = $this->Bonus->last();
        $nextDegreeStage = $this->getNextDegreeStageAttribute();
        $noteNext= $this->getNextNoteAttribute();
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
            'employeeSection' => $this->Section->name,
            'employeeDepartment' => $this->Section->Department->name,
            'employeeType' => $this->EmployeeType->name,
            'bonusJobTitle' => $this->BonusJobTitle->name,
            'bonusStudy' => $this->BonusStudy->name,
            'degreeStage' => 'الدرجة ' . $this->DegreeStage->Degree->name . ' المرحلة ' . $this->DegreeStage->Stage->name,
            'stage' =>   $this->DegreeStage->Stage->name,
            'degree' =>   $this->DegreeStage->Degree->name,
            'salary' => $this->DegreeStage->salary,
            'notesBonus' => $lastBonus->notes ?? "",

            'degreeStageNext' => 'الدرجة ' . $this->nextDegreeStage['Degree']['name']. ' المرحلة ' . $this->nextDegreeStage['Stage']['name'],
            'stageNext' =>   $this->nextDegreeStage['Stage']['name'],
            'degreeNext' =>   $this->nextDegreeStage['Degree']['name'],
            'salaryNext' => $this->nextDegreeStage['salary'],
            //'notesNext' => $this->getNextNoteAttribute($this->id) ?? "",
            'notesNext' => $noteNext!="" ? $noteNext: "لايوجد",

            // 'nextDegreeStage' => $this->nextDegreeStage,
            // 'lastDegreeStage' => $this->nextDegreeStage,

            'lastBonus' => new BonusWithoutEmployeeResource($lastBonus) ?? "",
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
