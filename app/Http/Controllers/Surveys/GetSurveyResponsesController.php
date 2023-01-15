<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Interfaces\SurveyRepositoryInterface;

class GetSurveyResponsesController extends ApiController
{

    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function getResponses(int $surveyId)
    {
        $data = $this->surveyRepository->getResponses($surveyId);
        return $this->successResponse($data, 200);
    }
}
