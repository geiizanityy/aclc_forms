<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectContentController;
use App\Http\Controllers\SubjectController;

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
Route::get('/fetchform',[SubjectContentController::class,'fetchForm']);



Route::get('/subjects',[SubjectController::class,'index']);
Route::get('/teachsubject/{id}', [SubjectController::class, 'subjectTeach']);
Route::get('/subject/{id}', [SubjectController::class, 'show']);
Route::get('/subject', [SubjectController::class, 'hashDemo']);



Route::get('/subjectcontents',[SubjectContentController::class,'index']);
Route::get('/subjectcontents/{id}',[SubjectContentController::class,'getSubjectContent']);
Route::get('/viewsubjectcontent/{id}',[SubjectContentController::class,'show']);
Route::post('/addsubjectcontent',[SubjectContentController::class,'store']);
Route::put('/updatesubjectcontent/{id}',[SubjectContentController::class,'update']);



Route::get('/geteditcontent/{id}',[SubjectContentController::class,'show']);

/* Route::put('/editform/{id}',[SubjectContentController::class,'update']); */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
