<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Interfaces\SurveyRepositoryInterface;
use App\Http\Requests\Surveys\CompleteSurveyRequest;

class CompleteSurveyController extends ApiController
{

    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function completeSurvey(CompleteSurveyRequest $request)
    {
        $validated = $request->validated();
        $data = $this->getFormattedResponses($validated['survey_responses']);
        $response =  $this->surveyRepository->completeSurvey($data);
        return $this->successResponse($data, 201);
    }

    private function getFormattedResponses($responses)
    {
        $data = [];
        foreach ($responses as $key => $item) {
            $item['user_id'] = request()->user()->id;
            $item['created_at'] = date('Y-m-d H:i:s');
            $item['updated_at'] = date('Y-m-d H:i:s');
            array_push($data, $item);
        }
        return $data;
    }
}
