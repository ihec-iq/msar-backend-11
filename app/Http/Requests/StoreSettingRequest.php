<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key' => 'requireds|string',
            'val_str' => 'nullable|string',
            'val_str2' => 'nullable|string',
            'val_int' => 'nullable|integer',
            'val_dbl' => 'nullable|double',
            'val_bool' => 'nullable|integer|boolean',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean'
        ];
    }
}
