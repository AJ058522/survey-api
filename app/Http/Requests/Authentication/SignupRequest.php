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
            'max' => 'The field :attribute must not be greater than :max characters.',
            'required' => 'The field :attribute is required.'
        ];
    }
}
