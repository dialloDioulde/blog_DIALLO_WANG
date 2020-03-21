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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'HomeController@index');


// Articles
Route::get('welcome', 'ArticlesController@index');

Route::get('/articles', 'ArticlesController@create');

Route::get('/article/{post_name}', 'ArticlesController@show');

Route::post('/articles', 'ArticlesController@store');



// Contatcs
//Route::get('/contactList', 'ContactController@index');

Route::get('/send_contact', 'ContactController@create');

Route::get('/email_contact', 'ContactController@index');

Route::post('/contacts', 'ContactController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Utilisateurs

Route::middleware('can:gestion-users')->group(function (){
    Route::resource('users', 'UserController');
});



// Utilisateurs profiles

Route::get('profiles/{id}', 'ProfileController@show')->name('profiles.show');

Route::get('profiles/{id}/edit', 'ProfileController@edit')->name('profiles.edit');

Route::patch('profiles/edit', 'ProfileController@update')->name('profiles.update');


// CRUD utilisateurs AJAX

Route::get('/articleCrud', 'ArticlesAjaxController@index');

Route::post('/addPost', 'ArticlesAjaxController@store');

Route::get('/editPost/{id}', 'ArticlesAjaxController@edit');

Route::put('/updatePost/{id}', 'ArticlesAjaxController@update');

Route::delete('/deletePost/{id}', 'ArticlesAjaxController@destroy');


// Commentaires
Route::get('/Comment', 'CommentController@create');

Route::post('/addComment', 'ArticlesController@store');


