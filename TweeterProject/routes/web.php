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

use App\Http\Controllers\TweetController;
use App\Http\Controllers\HomeController;

Route::get('/login', function () {
    return view('Welcome');
    error_log('Some message here.');
});

Auth::routes();

Route::get('/', 'homeController@index');

Route::post('/{id}/act', 'homeController@actOnLike');

Route::delete('/{id}', 'homeController@actOnDelete');

//add new routes here versus add new pages

Route::post('/savetweet', 'TweetController@feed');

Route::patch('/savetweet/{id}', 'TweetController@updatetweet');

/* Route::get('posts/{posts}', function () {
    return view('home');
}); */

Auth::routes();

Route::get('/user', 'ShowProfile@index');

Route::get('user/{user}', function () {
    return view('userprofile');
});

Auth::routes();

Route::get('/TweetsFeed', 'TweetController@show');

Route::get('tweetsfeed', function () {
    return view('tweetsfeed');

});

Route::patch('/tweetUpdate/{id}', 'TweetController@actOnUpdate');

Route::get('/userlist', 'usersController@index');

Route::get('usernames/{usernames}', function () {
    return view('userlist');
});

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'usersController@update']);
Route::delete('users/{user}/delete',  ['as' => 'users.delete', 'uses' => 'usersController@delete']);

// Route::get('/tweethistory', 'TweetController@read');

// Route::get('/tweethistory', 'CommentController@read');

//Route::get('/commenthistory','TweetController@read');
//Route::get('/likehistory', 'TweetController@read');
?>
