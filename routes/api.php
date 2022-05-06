<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
Route::get('/fetchform',[FormController::class,'fetchForm']);
Route::get('/formlist',[FormController::class,'index']);
Route::post('/addform',[FormController::class,'store']);
Route::get('/getselectedform/{id}',[FormController::class,'show']);
Route::put('/editform/{id}',[FormController::class,'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
