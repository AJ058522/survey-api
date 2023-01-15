<?php

namespace App\Interfaces;

interface SurveyRepositoryInterface
{
    public function completeSurvey(array $surveyData);
    public function getMissingResponses(int $surveyId);
    public function getOne(int $surveyId);
    public function getResponses(int $surveyId);
    public function surveyHasBeenResponded(int $surveyId);
}
