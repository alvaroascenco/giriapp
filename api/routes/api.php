<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiriaController;
use App\Http\Controllers\IdiomController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//retorna todas as gírias encontradas no banco
Route::get('/girias/{page}', [GiriaController::class, 'getGirias']);

//retorna girias filtradas encontradas no banco
Route::get('/giriasSearch/{str}', [GiriaController::class, 'filterGirias']);

//retorna os dados de uma giria especifica no banco
Route::get('/giria/{id}', [GiriaController::class, 'getGiria']);

//retorna idioms encontrado no banco paginados
Route::get('/idiom/{page}', [IdiomController::class, 'getIdioms']);

