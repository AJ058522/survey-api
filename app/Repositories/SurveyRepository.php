<?php

namespace App\Repositories;

use App\Interfaces\SurveyRepositoryInterface;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SurveyRepository implements SurveyRepositoryInterface
{

    public function completeSurvey(array $surveyData)
    {
        return SurveyResponse::insert($surveyData);
    }

    public function getMissingResponses(int $surveyId)
    {
        $haveVotedUsers = SurveyResponse::select('survey_responses.user_id')
            ->join('survey_questions', 'survey_responses.survey_question_id', 'survey_questions.id')
            ->where('survey_questions.survey_id', $surveyId)
            ->distinct();
        return User::whereNotIn('id', $haveVotedUsers)->get();
    }

    public function getOne(int $surveyId)
    {
        $survey = Survey::findOrFail($surveyId);
        $survey->survey_questions;
        return  $survey;
    }

    public function getResponses(int $surveyId)
    {
        return DB::select(DB::raw("
            SELECT surveys.name, survey_questions.question
            , IFNULL((SELECT SUM(vote) FROM survey_responses WHERE survey_responses.survey_question_id = survey_questions.id), 0)  AS totalVotes
            FROM surveys
            INNER JOIN survey_questions ON surveys.id = survey_questions.survey_id
            WHERE surveys.id = $surveyId
        "));
    }

    public function surveyHasBeenResponded(int $surveyId)
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
