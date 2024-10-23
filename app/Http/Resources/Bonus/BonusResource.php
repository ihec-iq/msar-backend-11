<?php

namespace App\Http\Resources\Bonus;


use App\Http\Resources\Employee\EmployeeBigLiteResource;
use App\Http\Resources\Employee\EmployeeLiteResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Http\Resources\User\UserLiteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BonusResource extends JsonResource
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
            'title' => $this->title,
            'issueDate' => $this->issue_date,
            'dateLastBonus' => $this->date_last_bonus,
            'dateLastWorth' => $this->date_last_worth,
            'dateNextWorth' => $this->date_next_worth,
            'numberLastBonus' => $this->number_last_bonus,
            'Employee' => new EmployeeLiteResource($this->Employee),
            'BonusJobTitle' => new GeneralIdNameResource($this->JobTitle),
            'BonusStudy' => new GeneralIdNameResource($this->Study),
            'BonusDegreeStage' => new BonusDegreeStageResource($this->DegreeStage),
            'UserCreate' => new UserLiteResource($this->UserCreate),
            'UserUpdate' => new UserLiteResource($this->UserUpdate),
        ];
        
    }
}
