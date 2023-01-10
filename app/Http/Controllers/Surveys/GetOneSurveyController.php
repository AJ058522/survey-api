<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Models\Survey;
use App\Models\SurveyResponse;

class GetOneSurveyController extends ApiController
{
    public function getOne(Survey $survey)
    {
        $isRespondes = $this->surveyHasBeenResponded($survey->id);
        if ($isRespondes) {
            return  $this->errorResponse("There's no surveys available.", 404);
        }
        $survey->survey_questions;
        return $this->showOne($survey, 200);
    }

    private function surveyHasBeenResponded(int $surveyId)
    {
        $userId = request()->user()->id;

        $response = SurveyResponse::select('survey_responses.user_id')
            ->join('survey_questions', 'survey_responses.survey_question_id', 'survey_questions.id')
            ->where('survey_questions.survey_id', $surveyId)
            ->where('survey_responses.user_id', $userId)
            ->get();

        return (count($response) > 0) ? true : false;
    }
}
