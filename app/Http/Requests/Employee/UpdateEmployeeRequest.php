<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Adjust authorization as needed
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'is_person' => 'boolean',
            'section_id' => 'exists:sections,id',
            'is_move_section' => 'boolean',
            'move_section_id' => 'exists:sections,id',
            'employee_center_id' => 'exists:employee_centers,id',
            'user_id' => 'exists:users,id',
            'employee_position_id' => 'exists:employee_positions,id',
            'employee_type_id' => 'exists:employee_types,id',
            'id_card' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'date_work' => 'nullable|date',
            'init_vacation' => 'nullable|numeric',
            'take_vacation' => 'nullable|numeric',
            'init_vacation_sick' => 'nullable|numeric',
            'take_vacation_sick' => 'nullable|numeric',
            'bonus_degree_stage_id' => 'exists:bonus_degree_stages,id',
            'bonus_study_id' => 'exists:bonus_studies,id',
            'bonus_job_title_id' => 'exists:bonus_job_titles,id',
            'number_last_bonus' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'date_last_bonus' => 'nullable|date',
            // 'date_next_bonus' => 'nullable|date',
        ];
    }
}
