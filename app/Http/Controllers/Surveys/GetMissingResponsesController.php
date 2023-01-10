<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Models\SurveyResponse;
use App\Models\User;

class GetMissingResponsesController extends ApiController
{
    public function getMissingResponses(int $surveyId)
    {
        $haveVotedUsers = SurveyResponse::select('survey_responses.user_id')
            ->join('survey_questions', 'survey_responses.survey_question_id', 'survey_questions.id')
            ->where('survey_questions.survey_id', $surveyId)
            ->distinct();

        $users = User::whereNotIn('id', $haveVotedUsers)->get();

        return $this->successResponse($users, 200);
    }
}
