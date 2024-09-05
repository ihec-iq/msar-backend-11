<?php

namespace App\Http\Requests\Archive;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ArchiveGetFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return  auth()->user()->can('delete archive');
        // return $this->middleware('delete archive');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'limit' => ['integer'],
            'title' => ['string', 'nullable'],
            'way' => ['string', 'nullable'],
            //'bill_id' => ['integer', 'nullable', 'exists:h_o_bill_tickets,id'],
            'isIn' => ['integer', 'nullable'],
            //'archiveTypeId' => ['integer', 'nullable','exists:archive_types,id'],
            'archiveTypeId' => ['integer', 'nullable'],
            //'sectionId' => ['integer', 'nullable','exists:sections,id'],
            'sectionId' => ['integer', 'nullable'],
            'description' => ['description', 'string', 'nullable'],
            'number' => ['nullable', 'string'],
            //'hasDate' => ['boolean'],
            'issueDateFrom' => ['date'],
            'issueDateTo' => ['date'],
        ];
    }
}
