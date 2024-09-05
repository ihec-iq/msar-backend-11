<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class OutputVoucherItemRequest extends FormRequest
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
            'outputVoucherId' => 'integer |exists:output_voucher_states,id',
            'inputVoucherId' => 'integer |exists:input_voucher_item_states,id',
            'count' => 'integer',
            'price' => 'integer',
            'date' => 'date',
            'notes' => 'string',
        ];
    }
}
