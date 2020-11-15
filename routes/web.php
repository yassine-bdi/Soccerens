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

Route::redirect('/', '/home'); 

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('user', 'UserController');
Route::get('/admin', 'AdministrationController@index')->name('admin')->middleware('CheckAdmin'); 
Route::get('/userconsult/{id}', 'AdministrationController@userconsult')->name('userconsult')->middleware('CheckAdmin'); 
Route::resource('posts', 'PostController')->middleware('auth'); 
Route::resource('message','MessagingController')->middleware('auth'); 
Route::post('/sendmessage/{id}/{name}','MessagingController@send')->name('send')->middleware('auth'); 

Route::resource('comment', 'CommentController');  
Route::post('/addcomment/{post}','PostController@addcomment')->name('addcomment'); 
Route::post('/addlike/{post}','PostController@addlike')->name('addlike'); 

Route::get('/check_relationship_status/{id}', [
    'uses' => 'FriendshipsController@check',
    'as' => 'check'
]);

Route::get('/add_friend', function() {
    return Auth::user()->add_friend(3); 
}
);

Route::get('/ids', function() {
    return App\User::find(1)->friends_ids(); 
}

); 

Route::get('/friends', function() {
    return App\User::find(1)->friends(); 
}

); 

Route::get('/pending', function() {
    return App\User::find(1)->pending_friend_requests(); 
}

);

Route::get('/is_friend', function() {
    return App\User::find(1)->is_friends_with(2); 
}

);

Route::get('/live_search/action', 'AdministrationController@action')->name('live_search.action');

Route::get('/autocomplete/fetch', 'AdministrationController@fetch')->name('autocomplete.fetch');
route::get('/inbox', 'MessagingController@inbox')->name('inbox'); 
