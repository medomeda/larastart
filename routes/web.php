<?php

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');

/** Formations */
Route::resource('formations', 'FormationController');

/** Posts */
Route::resource('posts', 'PostController');

/** Sociétés */
Route::group(['prefix' => 'societes'], function () {
    Route::get('/portrait/{id}', 'SocieteController@portrait')->name('societes.portrait');
    Route::get('/{id}/analysefondamentale', 'SocieteController@analysefondamentale')->name('societes.analysefondamentale');
    Route::get('/{id}/analysetechnique', 'SocieteController@analysetechnique')->name('societes.analysetechnique');
    Route::get('/{id}/graphique', 'SocieteController@graphique')->name('societes.graphique');
    Route::get('/{id}/synthese', 'SocieteController@synthese')->name('societes.synthese');
});
Route::resource('societes', 'SocieteController');


/**Admin */
Route::prefix('admin')->namespace('Back')->group(function () {
    
    /*
     * Main
     */
    Route::middleware(['auth','admin'])->group(function () {

        Route::get('/', 'AdminController@index')->name('admin.index');

    });

    

});

