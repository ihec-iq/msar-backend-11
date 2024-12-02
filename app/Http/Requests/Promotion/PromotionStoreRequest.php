<?php

namespace App\Http\Requests\Promotion;

use Illuminate\Foundation\Http\FormRequest;

class PromotionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'degree_stage_id' => 'required|exists:bonus_degree_stages,id',
            'number' => 'required|string',
            'issue_date' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
} 