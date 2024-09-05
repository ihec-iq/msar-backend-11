<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class InputVoucherItemRequest extends FormRequest
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
            'inputVoucherId' => 'integer |exists:input_vouchers,id',
            'itemId' => 'integer |exists:items,id',
            'stockId' => 'integer |exists:stocks,id',
            'description' => 'string',
            'count' => 'integer',
            'price' => 'integer',
            'notes' => 'string',
        ];
    }
}
