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

Route::get('/article/{post_title}', 'ArticlesController@show');

Route::post('/articles', 'ArticlesController@store');



// Contatcs
//Route::get('/contactList', 'ContactController@index');

Route::get('/send_contact', 'ContactController@create');

Route::get('/email_contact', 'ContactController@index');

Route::post('/contacts', 'ContactController@store')->name('contatcs.store');

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



// Création et Gestion de Post par le user même

Route::get('/post', 'PostController@create')->name('post.create');

Route::post('/post', 'PostController@store')->name('post.store');

Route::get('/post/{post}', 'PostController@edit')->name('post.edit');

Route::patch('/post/{post}', 'PostController@update')->name('post.update');

Route::delete('/post/{post}', 'PostController@destroy')->name('post.delete');




// Commentaires
Route::get('/Comment', 'CommentController@create');

Route::post('/addComment/{post}', 'ArticlesController@store')->name('addComment.store');

Route::get('/addComment/{comment}', 'ArticlesController@edit')->name('addComment.edit');

Route::patch('/addComment/{comment}', 'ArticlesController@update')->name('addComment.update');

Route::delete('/addComment/{comment}', 'ArticlesController@destroy')->name('addComment.delete');
