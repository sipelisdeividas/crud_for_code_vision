<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
        [
            'loginemail' => 'required|string|email|max:255',

            'loginpassword' => 'required|string|min:8',
        ];
    }
}