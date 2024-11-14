<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'nom' => 'required|string|min:2|max:255',
            'prenom' => 'required|string|min:2|max:255',
            'telephone' => 'required|string|min:9|max:255|unique:users,telephone',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:CLIENT,DISTRIBUTEUR,AGENT,ADMIN,MARCHAND',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'nom.string' => 'Le nom doit être une chaîne de caractères',
            'nom.min' => 'Le nom doit comporter au moins 2 caractères',
            'nom.max' => 'Le nom ne peut pas depasser 255 caractères',

            'prenom.required' => 'Le nom est obligatoire',
            'prenom.string' => 'Le nom doit être une chaîne de caractères',
            'prenom.min' => 'Le nom doit comporter au moins 2 caractères',
            'prenom.max' => 'Le nom ne peut pas depasser 255 caractères',

            'telephone.required' => 'Le numéro de téléphone est obligatoire',
            'telephone.string' => 'Le numéro doit être une chaîne de caractères',
            'telephone.min' => 'Le numéro doit comporter au moins 9 caractères',
            'telephone.max' => 'Le numéro ne peut pas depasser 255 caractères',
            'telephone.unique' => 'Ce numéro de télephone existe déjà dans notre système',
            
            'email.required' => 'L\'adresse email est obligatoire',
            'email.string' => 'L\'adresse email doit être une chaîne de caractères',
            'email.min' => 'L\'adresse email doit comporter au moins 9 caractères',
            'email.max' => 'L\'adresse email ne peut pas depasser 255 caractères',
            'email.unique' => 'Cette adresse email existe déjà dans notre système',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
