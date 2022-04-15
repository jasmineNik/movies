<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/dashboard/{id?}', function ($id=null){
//    return view('movies.index', ['name' => 'Admin', 'id' => $id]);
//});
Route::get('/dashboard/{id}/{name}', function ($id, $name){
    return view('movies.index', ['name' => $name, 'id' => $id]);
})
//    ->where('id', '[0-9]+')
    ->whereNumber('id')->whereAlpha('name')
    ->name('dashboard');
