<?php

namespace App\Http\Resources\Vacation;

use App\Http\Resources\Employee\EmployeeLiteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacationResource extends JsonResource
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
            'Employee' => new EmployeeLiteResource($this->Employee),

            'deservedRecord' => $this->old_record,
            'totalTaken' => $this->new_record + ($this->sumTime / 7) + $this->sumDaily,
            'remaining' => $this->old_record - ($this->new_record + ($this->sumTime / 7) + $this->sumDaily),
            'currentYearVacations' => ($this->sumTime / 7) + $this->sumDaily,
            'currentYearTimeVacations' => $this->sumTime > 0 ? $this->sumTime : 0,
            'currentYearDailyVacations' => $this->sumDaily > 0 ? $this->sumDaily : 0,
            'deservedSickRecord' => $this->old_record_sick,
            'takenSick' => $this->new_record_sick + $this->sumSick,
            'remainingSick' => $this->old_record_sick - ($this->new_record_sick + $this->sumSick),
            'currentYearSickVacations' => $this->sumSick > 0 ? $this->sumSick : 0,

            'record' => $this->record,
            'recordSick' => $this->record_sick,
        ];
    }
}
