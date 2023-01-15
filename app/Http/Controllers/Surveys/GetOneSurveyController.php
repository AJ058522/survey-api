<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Interfaces\SurveyRepositoryInterface;

class GetOneSurveyController extends ApiController
{

    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function getOne(int $surveyId)
    {
        $isRespondes = $this->surveyRepository->surveyHasBeenResponded($surveyId);
        if ($isRespondes) {
            return  $this->errorResponse("There's no surveys available.", 404);
        }
        $survey = $this->surveyRepository->getOne($surveyId);
        return $this->showOne($survey, 200);
    }
}
