<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Interfaces\SurveyRepositoryInterface;

class GetMissingResponsesController extends ApiController
{

    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function getMissingResponses(int $surveyId)
    {
        $users =  $this->surveyRepository->getMissingResponses($surveyId);
        return $this->successResponse($users, 200);
    }
}
