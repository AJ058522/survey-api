<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;

class GetSurveyResponsesController extends ApiController
{
    public function getResponses(int $surveyId)
    {
        $data = DB::select(DB::raw("
            SELECT surveys.name, survey_questions.question
            , IFNULL((SELECT SUM(vote) FROM survey_responses WHERE survey_responses.survey_question_id = survey_questions.id), 0)  AS totalVotes
            FROM surveys
            INNER JOIN survey_questions ON surveys.id = survey_questions.survey_id
            WHERE surveys.id = $surveyId
        "));
        return $this->successResponse($data, 200);
    }
}
