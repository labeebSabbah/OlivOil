<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\AmountRule;
use App\Rules\PhoneRule;

class StoreOrderRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:orders,name',
            'phone' => [
                'required',
                'unique:orders,phone',
                new PhoneRule(),
            ],
            'work_location' => 'required|string|max:255',
            "amount" => [
                'required',
                new AmountRule(),
            ],
            "period" => "required|numeric|gte:3|lte:8",
        ];
    }
}
