<?php

namespace App\Http\Resources\Bonuses;

use App\Http\Resources\Document\DocumentHrBotResource;
use App\Http\Resources\Document\DocumentResource;
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
            'dateLastBounues' => $this->date_last_bounues,
            'dateLastWorth' => $this->date_last_worth,
            'dateNextWorth' => $this->date_next_worth,
            'JobTitle' => new GeneralIdNameResource($this->JobTitle),
            'DigreeStage' => new GeneralIdNameResource($this->DigreeStage),
            'Study' => new GeneralIdNameResource($this->Study),
            'Employee' => new EmployeeBigLiteResource($this->Employee),
            'UserCreate' => new UserLiteResource($this->UserCreate),
            'UserUpdate' => new UserLiteResource($this->UserUpdate),
        ];
        
    }
}
