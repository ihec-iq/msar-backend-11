<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class ItemGetFilterRequest extends FormRequest
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
            'limit' => ['integer'],
            'name' => ['string', 'nullable'],
            'description' => ['string', 'nullable'],
            'code' => ['string', 'nullable'],
            'itemCategoryId' => ['integer', 'nullable'],
            'measuringUnit' => ['string', 'nullable'],
        ];
    }
}
