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
// お問い合わせ
Route::get('/contact', 'ContactsController@index')->name('contacts.index');
Route::post('/contact/confirm', 'ContactsController@confirm')->name('contacts.confirm');
Route::post('/contact/send','ContactsController@send')->name('contacts.send');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function() {
    //認証されているユーザーのみ

    Route::get('/', 'Admin\UserController@index')->name('user.index');
    Route::get('/users', 'Admin\UserController@show')->name('user.show');
    Route::post('/user/delete/','Admin\UserController@destroy')->name('user.delete');

    // パラメーターの後に？を付けるとオプション指定になる。{user?}　ユーザー作成、編集
    Route::get('/user/{user?}', 'Admin\UserController@create')->name('user.create');
    Route::post('/user/{user?}','Admin\UserController@store')->name('user.store');


    Route::get('/received/list', 'Admin\ContactController@show')->name('contact.show');
    // 必須パラメーター{contact}　　　お問い合わせ編集
    Route::get('/received/edit/{contact}', 'Admin\ContactController@edit')->name('contact.edit');
    Route::post('/received/edit/{contact}', 'Admin\ContactController@store')->name('contact.store');
});
