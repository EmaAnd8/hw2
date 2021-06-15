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

//route di login e logout
Route::get("/login","LoginController@login")->name("login");
Route::get("/logout", "LoginController@logout")->name("logout");
Route::post('/login','LoginController@checkLogin');


//route per la registrazione
Route::get('/register','RegisterController@index')->name("registrazione");
Route::post('/register','RegisterController@create');
Route::get('/register/username/{q}','RegisterController@checkUsername');
Route::get('/register/email/{query}', "RegisterController@checkEmail");// da fare




route::get('/home','HomeController@index')->name('home');

//route per ritornare i preferiti
route::get('/home/search','FeedController@feed')->name('preferiti');

//ricerca con API

route::get('home/search/lyrics','CreateController@SearchLyrics')->name('lyrics');
route::get('home/search/album','CreateController@SearchSpotify')->name('album');
route::get('home/search/track','CreateController@SearchSpotify_1')->name('track');
route::get('home/search/artist','CreateController@SearchSpotify_2')->name('artist');

//route per creare ed inserire un preferito e rimuoverlo
route::post('/home/create','CreateController@create_favourite');
route::post('/home/delete','DeleteController@delete');

//route per restituire le view
route::get('/autori','AutoriController@index')->name('autori');
route::get('/artisti','ArtistiController@index')->name('artisti');
route::get('/album','AlbumController@index')->name('album');
route::get('/newsletter','NewsLetterController@index')->name('newsletter');

//route per restituire tutti  i contenuti di album,autori,artisti
route::get('/autori/ritornati','AutoriController@autori');
route::get('/artisti/ritornati','ArtistiController@artisti');
route::get('/album/ritornati','AlbumController@album');


//route per gli iframe delle varie pagine
route::get('/album/iframe','IframeController@Spotify_coll_3');
route::get('/home/track/iframe','IframeController@Spotify_coll');
route::get('/artisti/iframe','IframeController@Spotify_coll_2');



//per ritornare i brani di un determinato album
route::get('/album/brano','BranoController@getBrani');
route::get('/register/verification/{username}/{verification_code}','EmailController@getverified')->name('render');


//inserire dati nella newsletter
route::post('/newsletter','NewsLetterController@insert')->name('request');


//route per password dimenticata
route::get('/forgot_password','ForgotPassword@forgot')->name('forgot');
route::post('/forgot_password','ForgotPassword@password');
route::get('/reset_password/{email}/{code}','ForgotPassword@reset');
route::post('/reset_password/{email}/{code}','ForgotPassword@resetPassword');
