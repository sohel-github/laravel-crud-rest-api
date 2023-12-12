<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentSubjectController;
use App\Http\Controllers\Api\StudentSectionController;
use App\Http\Controllers\Api\StudentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/class', [StudentClassController::class, 'index']);
Route::post('/class/store', [StudentClassController::class, 'store']);
Route::get('/class/edit/{id}', [StudentClassController::class, 'edit']);
Route::post('/class/update/{id}', [StudentClassController::class, 'update']);
Route::get('/class/delete/{id}', [StudentClassController::class, 'delete']);

Route::get('/subject', [StudentSubjectController::class, 'index']);
Route::post('/subject/store', [StudentSubjectController::class, 'store']);
Route::get('/subject/edit/{id}', [StudentSubjectController::class, 'edit']);
Route::post('/subject/update/{id}', [StudentSubjectController::class, 'update']);
Route::get('/subject/delete/{id}', [StudentSubjectController::class, 'delete']);

Route::get('/section', [StudentSectionController::class, 'index']);
Route::post('/section/store', [StudentSectionController::class, 'store']);
Route::get('/section/edit/{id}', [StudentSectionController::class, 'edit']);
Route::post('/section/update/{id}', [StudentSectionController::class, 'update']);
Route::get('/section/delete/{id}', [StudentSectionController::class, 'delete']);

Route::get('/student', [StudentController::class, 'index']);
Route::post('/student/store', [StudentController::class, 'store']);
Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::post('/student/update/{id}', [StudentController::class, 'update']);
Route::get('/student/delete/{id}', [StudentController::class, 'delete']);
