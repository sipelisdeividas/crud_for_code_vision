<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{

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
        return
        [
            'product_name' => 'required|string|max:255',

            'description' => 'required|string',

            'mileage' => 'required|integer',

            'euro_standart' => 'required|string|max:50',

            'year' => 'required|integer|min:1900|max:' . date('Y'),

            'engine_type' => 'required|string|max:100',

            'price' => 'required|numeric|min:0',

            'user_id' => 'required|exists:users,id',
        ];
    }
}