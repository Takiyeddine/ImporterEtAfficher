<?php

use Illuminate\Http\Request;

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
Route::get('/fichiers','FileController@index'); //Recuperer les fichiers de la BDD en utilisant la fonction index qui se trouve dans le controleur
Route::post('/files','FileController@store');//sauvegrader le fichier dans le serveur et son chemin dans la BDD 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
