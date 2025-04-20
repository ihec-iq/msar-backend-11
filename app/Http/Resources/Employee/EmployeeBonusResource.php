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
        $noteNext = $this->getNextNoteAttribute();
        return [
            'id' => $this->id,
            'checked' => 0,
            'name' => $this->name,
            'current' => [
                'number' => $this->number_last_bonus,
                'dateBonus' => $this->date_last_bonus,
                'numberPromotion' => $this->number_last_promotion,
                'datePromotion' => $this->date_last_promotion,
                'degreeStage' => 'الدرجة ' . $this->DegreeStage->Degree->name . ' المرحلة ' . $this->DegreeStage->Stage->name,
                'stage' =>   $this->DegreeStage->Stage->name,
                'degree' =>   $this->DegreeStage->Degree->name,
                'salary' => $this->DegreeStage->salary,
                'notes' => $lastBonus->notes ?? "",
            ],
            'next' => [
                'number' => $this->number_next_bonus,
                'dateBonus' => $this->date_next_bonus,
                'numberPromotion' => $this->number_next_promotion,
                'datePromotion' => $this->date_next_promotion,
                'difBonusDate' => $this->getDifNextBonusDateAttribute(),
                'difPromotionDate' => $this->getDifNextPromotionDateAttribute(),
                'degreeStage' => 'الدرجة ' . $this->nextDegreeStage['Degree']['name'] . ' المرحلة ' . $this->nextDegreeStage['Stage']['name'],
                'stage' =>   $this->nextDegreeStage['Stage']['name'],
                'degree' =>   $this->nextDegreeStage['Degree']['name'],
                'salary' => $this->nextDegreeStage['salary'],
                'notes' => $noteNext != "" ? $noteNext : "لايوجد",
            ],


            'position' => $this->EmployeePosition->name,
            'center' => $this->EmployeeCenter->name,
            'section' => $this->Section->name,
            'department' => $this->Section->Department->name,
            'type' => $this->EmployeeType->name,
            'jobTitle' => $this->BonusJobTitle->name,
            'study' => $this->Study->name,
            'certificate' => $this->Certificate->name,
            'notes' => '',
            'LastBonus' => new BonusWithoutEmployeeResource($lastBonus) ?? "",
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
