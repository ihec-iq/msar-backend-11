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
            'is_in' => 'boolean',
            'number' => 'string|nullable',
            'issue_date' => 'date',
            'archive_type_id' => ['integer', 'exists:archive_types,id'],
            // 'sectionId' => ['integer', 'exists:sections,id'],
        ];
    }

    public function messages()
    {
        return [
            'issueDate.required' => 'يجب عليك ادخال التاريخ',
            'issueDate.date' => 'يجب عليك ادخال التاريخ بشكل صحيح',
            'archive_type_id.required' => 'يجب عليك ادخال نوع الأرشيف',
            'archive_type_id.exists' => 'يجب عليك ادخال نوع أرشيف صالح',
            'title.string' => 'يجب عليك ادخال عنوان صالح',
            'description.string' => 'يجب عليك ادخال وصف صالح',
            'is_in.boolean' => 'يجب عليك ادخال صحيح أو خطأ',
            'number.string' => 'يجب عليك ادخال رقم صالح',
        ];
    }
}
