<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

//Route::get('/counties', [CountryController::class, 'index']);
Route::get('/counties', 'CountryController@index');
