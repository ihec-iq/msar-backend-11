<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeBonusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Adjust authorization as needed
    }

    public function rules(): array
    {
        return [
            'employee_position_id' => 'exists:employee_positions,id',
            'degree_stage_id' => 'exists:bonus_degree_stages,id',
            'study_id' => 'exists:studies,id',
            'certificate_id' => 'exists:certificates,id',
            'bonus_job_title_id' => 'exists:bonus_job_titles,id',
            'number_last_bonus' => 'nullable|string|max:255',
            'number_last_promotion' => 'nullable|string|max:255',
            'date_last_bonus' => 'nullable|date',
            'date_last_promotion' => 'nullable|date',
            'date_next_bonus' => 'nullable|date',
            // 'date_next_bonus' => 'nullable|date',
        ];
    }
}
