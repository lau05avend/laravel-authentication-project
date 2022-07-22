<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class SaveUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required','email','unique:users,email,'.$this->user],
            'password' => ['required','confirmed'],
        ];
    }

    public function attributes(){
        return [
            'name' => 'Nombre Completo',
            'email' => 'Correo Electronico',
            'password' => 'Contraseña',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => 0
        ], 422));
    }


}
