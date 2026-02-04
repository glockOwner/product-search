<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFilterRequest extends FormRequest
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
            'q' => 'string|nullable',
            'price_from' => ['numeric', 'decimal:2', 'nullable'],
            'price_to' => ['numeric', 'decimal:2', 'nullable'],
            'category_id' => ['integer', 'min:0', 'nullable'],
            'in_stock' => ['boolean', 'nullable'],
            'rating_from' => ['numeric', 'min:0', 'nullable'],
            'per_page' => ['integer', 'min:0', 'nullable'],
            'sort' => ['in:price_asc,price_desc,rating_desc,newest', 'nullable'],
        ];
    }
}
