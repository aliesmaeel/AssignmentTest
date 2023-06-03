<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)

    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'data'      => $validator->errors(),
            'message'   => 'Validation Error ! '
        ]));
    }
}
