<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\GeneralDataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/study-programs', [StudyProgramController::class, 'store']);
Route::post('/survey', [SurveyController::class, 'store']);
Route::post('/general-data', [GeneralDataController::class, 'store']);
Route::get('/general-data', [GeneralDataController::class, 'getAllData']);
Route::get('/general-data/report', [GeneralDataController::class, 'getReportData']);

?>