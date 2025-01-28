<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string | required',
            'section_id' => 'exists:sections,id',
            'move_section_id' => 'exists:sections,id',
            'employee_center_id' => 'exists:employee_centers,id',
            'employee_position_id' => 'exists:employee_positions,id',
            'employee_type_id' => 'exists:employee_types,id',
            'id_card' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:255',
            'telegram_id' => 'nullable|string|max:255',
            'date_work' => 'nullable|date',
            'init_vacation' => 'nullable|date',
            'take_vacation' => 'nullable|date',
            'init_vacation_sick' => 'nullable|date',
            'take_vacation_sick' => 'nullable|date',
            'degree_stage_id' => 'exists:degree_stages,id',
            'study_id' => 'exists:studies,id',
            'certificate_id' => 'exists:certificates,id',
            'bonus_job_title_id' => 'exists:bonus_job_titles,id',
            'number_last_bonus' => 'nullable|string|max:255',
            'date_last_bonus' => 'nullable|date',
            'date_next_bonus' => 'nullable|date',
            'user_id' => 'exists:users,id',
            'is_person' => 'boolean',
            'is_move_section' => 'boolean',
            
        ];
    }
}
