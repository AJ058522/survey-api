<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Surveys\CompleteSurveyRequest;
use App\Models\SurveyResponse;

class CompleteSurveyController extends ApiController
{
    public function completeSurvey(CompleteSurveyRequest $request)
    {
        $validated = $request->validated();
        $data = $this->getFormattedResponses($validated['survey_responses']);
        $response = SurveyResponse::insert($data);
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
