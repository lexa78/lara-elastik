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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',['as'=>'main','uses'=>'VacancyForUserController@index']);
Route::get('show-vacancy/{id}',['as'=>'showVacancy','uses'=>'VacancyForUserController@show_vacancy']);
Route::resource('admin/vacancies', 'VacancyController');