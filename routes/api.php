<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\SignupController;
use App\Http\Controllers\Surveys\CompleteSurveyController;
use App\Http\Controllers\Surveys\GetMissingResponsesController;
use App\Http\Controllers\Surveys\GetOneSurveyController;
use App\Http\Controllers\Surveys\GetSurveyResponsesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/signup', [SignupController::class, 'signup']);
});


Route::group([
    'middleware' => 'auth:api'
], function () {

    Route::prefix('auth')->group(function () {
        Route::get('/logout', [LogoutController::class, 'logout']);
    });

    Route::prefix('surveys')->group(function () {
        Route::get('/{survey}', [GetOneSurveyController::class, 'getOne']);
        Route::get('getMissingResponses/{surveyId}', [GetMissingResponsesController::class, 'getMissingResponses'])->middleware('isAdmin');
        Route::get('getSurveyResponses/{surveyId}', [GetSurveyResponsesController::class, 'getResponses']);
        Route::post('/completeSurvey', [CompleteSurveyController::class, 'completeSurvey']);
    });
});
