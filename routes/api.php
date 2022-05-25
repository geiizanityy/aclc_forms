<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectContentController;

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
Route::get('/subjectcontents',[SubjectContentController::class,'index']);
Route::post('/addform',[SubjectContentController::class,'store']);
Route::get('/getselectedform/{id}',[SubjectContentController::class,'show']);
Route::put('/editform/{id}',[SubjectContentController::class,'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
