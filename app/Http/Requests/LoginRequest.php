<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
            'login' =>'required|string',
            'password' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'L\'email ou le numero de telephone est obligatoire',
            'login.string' => 'L\'email ou le numero de telephone doit etre une chaine de caracteres',
            'password.string' => 'Le mot de passe doit etre une chaine de caracteres',
            'password.required' => 'Le mot de passe est obligatoire',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json(['erros' => $validator->errors()], 400));
    }
}
