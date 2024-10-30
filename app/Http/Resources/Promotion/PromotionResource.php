<?php

namespace App\Http\Resources\Promotion;

use App\Http\Resources\Bonus\BonusDegreeStageResource;
use App\Http\Resources\Bonus\BonusJobTitleResource;
use App\Http\Resources\Employee\EmployeeLiteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Employee' => new EmployeeLiteResource($this->whenLoaded('Employee')),
            'numberPromotion' => $this->number_promotion,
            'issueDate' => $this->issue_date,
            'note' => $this->note,
            'BonusDegreeStage' => new BonusDegreeStageResource($this->whenLoaded('BonusDegreeStage')),
            'BonusJobTitle' => new BonusJobTitleResource($this->whenLoaded('BonusJobTitle')),
            // Add other fields as necessary
        ];
    }
} 