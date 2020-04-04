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

Route::resource('categories','CategoryController');
Route::resource('users','UserController');
Route::resource('books','BookController');
Route::get('book/borrow/{id}', 'BookController@borrow');
Route::get('available/{id}', 'BookController@available')->name('book.available');
Route::match(['put', 'patch'],'book/{id}/unavailable', 'BookController@unavailable')->name('book.unavailable');