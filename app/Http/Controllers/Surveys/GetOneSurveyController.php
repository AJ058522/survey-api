<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Models\Survey;

class GetOneSurveyController extends ApiController
{
    public function getOne(Survey $survey)
    {
        $survey->survey_questions;
        return $this->showOne($survey, 200);
    }
}
