<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::view('/', 'welcome', ['name' => 'Admin']);
//Route::get('/dashboard/{id?}', function ($id=null){
//    return view('movies.index', ['name' => 'Admin', 'id' => $id]);
//});

Route::get('/dashboard/{id?}/{name?}', function ($id=null, $name=null){
    return view('dashboard', ['name' => $name, 'id' => $id]);
})
//    ->where('id', '[0-9]+')
    ->whereNumber('id')->whereAlpha('name')
    ->name('dashboard');


Route::controller(MovieController::class)->group(function (){
    Route::get('/movies', 'index')
        ->name('movies');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::controller(MovieController::class)->group(function (){
        Route::get('/movie', 'create')->name('add_movie');
        Route::post('/movie','store');
        Route::get('/movie/{id}', 'edit')
            ->whereNumber('id');
        Route::put('/movie', 'update')
            ->name('movie_update');
    });
});
