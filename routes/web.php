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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/students', 'StudentsController@index')->name('students');
Route::post('/students', 'StudentsController@store')->name('students.store');
Route::delete('/students/{id}','StudentsController@destroy')->name('students.destroy');
Route::put('/students/{student}','StudentsController@update')->name('students.update');

Route::get('/{id}/posts/','PostController@index')->name('user.posts');
