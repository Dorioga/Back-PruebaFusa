<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PublishController;




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

Route::get('/person/{cedula}',[PersonaController::class,'getPersonbyCedula']);
Route::post('/person/add',[PersonaController::class,'addPerson']);
Route::post('/person/login',[PersonaController::class,'login']);
Route::post('/person/logout',[PersonaController::class,'logout']);
Route::post('/publish/add',[PublishController::class,'addPublish']);
Route::get('/publish',[PublishController::class,'getAllPublish']);
Route::get('/publish/getpublish/{data}',[PublishController::class,'getPublishbyId']);
Route::post('/publish/update',[PublishController::class,'updatePublish']);
Route::post('/publish/delete/{id}',[PublishController::class,'deletePublish']);


