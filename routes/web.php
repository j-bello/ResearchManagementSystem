<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicAddRemoveFieldController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AreaController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/titles.search', function () {
        return view('titles.search');
    })->name('titles.search');

    Route::get('/titles.upload', function () {
        return view('titles.upload');
    })->name('titles.upload');

    Route::post('/titles/upload/{id}', [TitleController::class, 'upload'])->name('titles.upload');

   // Route::post('/titles/upload', [TitleController::class, 'upload']);




    //RESEARCH THEMES
    Route::get('/themes.index', function () {
        return view('themes.index');
    })->name('themes.index');

    Route::get('/themes.index', [ThemeController::class, 'index']);

    Route::get('/themes.create', function () {
        return view('themes.create');
    })->name('themes.create');




    Route::get('/themes.edit', function () {
        return view('themes.edit');
   })->name('themes.edit');


    Route::get('/themes.show', function () {
        return view('themes.show');
    })->name('themes.show');

    Route::get('/themes.area', function () {
        return view('themes.area');
    })->name('themes.area');

    Route::get('add-remove-multiple-input-fields', [ThemeController::class, 'index']);
    Route::post('addResearch', [ThemeController::class, 'addResearch']);






    Route::get('/areas.index', [AreaController::class, 'index']);


    //RESEARCH AREAS

    Route::get('/researchAreas.index', function () {
        return view('researchAreas.index');
    })->name('researchAreas.index');
    Route::get('/researchAreas.create', function () {
        return view('researchAreas.create');
    })->name('researchAreas.create');



    Route::get('/researchAreas.edit', function () {
        return view('researchAreas.edit');
    })->name('researchAreas.edit');


    Route::get('/researchAreas.show', function () {
        return view('researchAreas.show');
    })->name('researchAreas.show');


});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('themes', \App\Http\Controllers\ThemeController::class);
    Route::resource('titles', \App\Http\Controllers\TitleController::class);
    Route::resource('users', \App\Http\Controllers\UsersController::class);

});
