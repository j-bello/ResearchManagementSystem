<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicAddRemoveFieldController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\Search;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

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





    Route::post('/titles/upload/{id}', [TitleController::class, 'upload'])->name('titles.upload');

    Route::get('/titles/download/{file}', [TitleController::class, 'download'])->name('titles.download');

  // Route::post('/titles/update/{id}', [TitleController::class, 'update'])->name('titles.update');






});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('themes', \App\Http\Controllers\ThemeController::class);
    Route::resource('titles', \App\Http\Controllers\TitleController::class);
    Route::resource('users', \App\Http\Controllers\UsersController::class);

});


Route::get('search', Search::class)
->middleware(['auth:sanctum', 'verified'])
->name('search');

Route::get('/livewire.search', function () {
    return view('livewire.search');
})->name('livewire.search');



Route::get('/livewire.show', function () {
    return view('livewire.show');
})->name('livewire.show');






Route::get('/titles.view', function () {
    return view('titles.view');
})->name('titles.view');



//Route::get('/pdf/previewTitles', [PDFController::class, 'showTitles']);
//Route::get('/title/pdf', [PDFController::class, 'titlePDF']);

Route::get('pdf/showTitles', [PDFController::class, 'showTitles'])->name('pdf.showTitles');
Route::get('pdf/titlePDF', [PDFController::class, 'titlePDF'])->name('pdf.titlePDF');

Route::get('pdf/showUsers', [PDFController::class, 'showUsers'])->name('pdf.showUsers');
Route::get('pdf/userPDF', [PDFController::class, 'userPDF'])->name('pdf.userPDF');

Route::get('pdf/showThemes', [PDFController::class, 'showThemes'])->name('pdf.showThemes');
Route::get('pdf/themePDF', [PDFController::class, 'themePDF'])->name('pdf.themePDF');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
