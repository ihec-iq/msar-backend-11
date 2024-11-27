<?php

namespace App\Http\Resources\Bonus;


use App\Http\Resources\Employee\EmployeeBigLiteResource;
use App\Http\Resources\Employee\EmployeeLiteBonusResource;
use App\Http\Resources\Employee\EmployeeLiteResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Http\Resources\User\UserLiteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BonusWithoutEmployeeResource extends JsonResource
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
            'issueDate' => $this->issue_date,
            'number' => $this->number,
            'employee' =>  $this->Employee->name,
            'DegreeStage' => new BonusDegreeStageResource($this->DegreeStage),
            'UserCreate' => new UserLiteResource($this->UserCreate),
            'UserUpdate' => new UserLiteResource($this->UserUpdate),
            'notes' => $this->notes,
        ];
        
    }
}
