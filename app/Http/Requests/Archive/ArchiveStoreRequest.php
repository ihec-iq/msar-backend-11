<?php

namespace App\Http\Requests\Archive;

use Illuminate\Foundation\Http\FormRequest;

class ArchiveStoreRequest extends FormRequest
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
            'title' => 'string',
            'description' => 'string|nullable',
            'isIn' => 'boolean',
            'number' => 'string|nullable',
            'issueDate' => 'date',
            'archiveTypeId' => ['integer', 'exists:archive_types,id'],
            // 'sectionId' => ['integer', 'exists:sections,id'],
        ];
    }

    public function messages()
    {
        return [
            'issueDate.required' => 'يجب عليك ادخال التاريخ',
            'issueDate.date' => '',
        ];
    }
}
