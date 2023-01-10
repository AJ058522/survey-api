<?php

namespace App\Http\Requests\Surveys;

use Illuminate\Foundation\Http\FormRequest;

class CompleteSurveyRequest extends FormRequest
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
            'survey_responses' => 'required|array',
            'survey_responses.*.survey_question_id' => 'required|numeric',
            'survey_responses.*.vote' => 'required|numeric|max:5'
        ];
    }

    public function messages(): array
    {
        return [
            'array' => 'The field :attribute must be an array.',
            'max' => 'The field :attribute must not be greater than :max characters.',
            'numeric' => 'The field :attribute must be a number.',
            'required' => 'The field :attribute is required.'
        ];
    }
}
