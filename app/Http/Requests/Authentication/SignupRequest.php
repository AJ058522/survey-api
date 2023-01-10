<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|max:191',
            'password_confirmation' => 'required|string|max:191'
        ];
    }

    public function messages(): array
    {
        return [
            'confirmed' => 'El campo :attribute no coincide con la confirmación de :attribute.',
            'email' => 'El campo :attribute debe ser del tipo email.',
            'max' => 'El campo :attribute excede el límite de :max caracteres.',
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser del tipo texto.',
            'unique' => 'El :attribute ya se encuentra registrado.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirmación de Contraseña',
        ];
    }
}
