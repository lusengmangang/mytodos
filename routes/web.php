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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});



Route::post('/save-project','ProjectController@addProject') ;

Route::get('/my-todos','TodosController@index') ;
Route::post('/my-todos/add','TodosController@addTodo') ;


Route::get('/tasks','TaskController@index') ;
Route::post('/tasks/add','TaskController@addTask') ;
Route::get('/tasks/{taskid}','ActivityController@index') ;
Route::post('/tasks/{taskid}/add','ActivityController@addLog') ;
