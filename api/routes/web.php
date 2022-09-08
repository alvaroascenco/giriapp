<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GuestController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\GiriaController;
use \App\Http\Controllers\IdiomController;




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

Route::get('/', [GuestController::class, 'index']);
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/idioms', [HomeController::class, 'idiomsPage'])->name('idioms');

    Route::get('/user-options', [HomeController::class, 'userOptionsPage']);

    Route::get('/create', [GiriaController::class, 'newGiria']);
    Route::post('/create/register', [GiriaController::class, 'createGiria']);

    Route::get('/edit/{giriaId}', [GiriaController::class, 'editGiria']);
    Route::post('/edit/update/{giriaId}', [GiriaController::class, 'updateGiria']);

    Route::get('/delete/{giriaId}', [GiriaController::class, 'deleteGiria']);

    Route::get('/create/idiom', [IdiomController::class, 'idiomCreationForm']);
    Route::get('/edit/idiom/{idiomId}', [IdiomController::class, 'editIdiomPage']);
    Route::post('/create/idiom/register', [IdiomController::class, 'createIdiom']);
    Route::post('/update/idiom/{idiomId}', [IdiomController::class, 'updateIdiom']);
    Route::get('/delete/idiom/{idiomId}', [IdiomController::class, 'deleteIdiom']);
});

Route::get('/token', function () {
    return csrf_token(); 
});