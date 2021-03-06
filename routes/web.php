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

Route::get('/', 'HomeController@index')->name('home');

// Email Verification Routes...
Auth::routes(['verify' => true]);

Route::get('/baby-names', 'NameController@index');
Route::get('/muslim-girl-names', 'NameController@girls');
Route::get('/muslim-boy-names', 'NameController@boys');
Route::get('/name/{slug}.html', 'NameController@info');
Route::get('/search', 'SearchController@search');
//static pages
Route::get('/aqeeqa.html', 'PageController@aqeeqa');
Route::get('/circumcision.html', 'PageController@circumcision');
Route::get('/why-muslims-looking-for-meaning-of-name.html', 'PageController@tasmiyah');
Route::get('/privacy.html', 'PageController@privacy');
Route::get('/contacts.html', 'ContactController@index');
Route::post('contact-us', 'ContactController@SendContact');
Route::get('comments.html', 'PageController@comments');
//random names
Route::get('/random-baby-names', 'NameController@randomNames');
Route::get('/random-girl-names', 'NameController@randomGirls');
Route::get('/random-boy-names', 'NameController@randomBoys');
//short names
Route::get('/short-muslim-baby-names', 'ShortNameController@index');
Route::get('/three-letter-boy-names', 'ShortNameController@threeLetterBoys');
Route::get('/three-letter-girl-names', 'ShortNameController@threeLetterGirls');
Route::get('/four-letter-boy-names', 'ShortNameController@fourLetterBoys');
Route::get('/four-letter-girl-names', 'ShortNameController@fourLetterGirls');
Route::get('/five-letter-boy-names', 'ShortNameController@fiveLetterBoys');
Route::get('/five-letter-girl-names', 'ShortNameController@fiveLetterGirls');
//favorites
Route::post('/favorite/{name}', 'FavoriteController@favorite');
Route::post('/unfavorite/{name}', 'FavoriteController@unFavorite');
Route::post('/favoritetemp/{name}', 'FavoriteController@favoriteTemp');
Route::post('/unfavoritetemp/{name}', 'FavoriteController@unFavoriteTemp');
Route::post('/isfavorited/{name}', 'FavoriteController@isFavorited');
Route::get('/favorite-names.html', 'FavoriteController@index');
Route::get('/most-favorited-muslim-baby-names', 'FavoriteController@favorited');
Route::post('/send-my-favorite-names', 'FavoriteController@sendIt');
Route::post('/send-saved-names', 'FavoriteController@sendSaved');
Route::get('/favorite/download', 'FavoriteController@download');
//Route::get('/ajax/my/favorites/{id}', 'FavoriteController@ajax');
Route::get('get-favorites', 'FavoriteController@getFavorites');
Route::delete('/delete-my-saved-names/{id}', 'FavoriteController@deleteSaved');
//names by letters
Route::get('/boy-names-by-letter.html', 'NameController@boysLetters');
Route::get('/girl-names-by-letter.html', 'NameController@girlsLetters');
Route::get('/boy-names-starting-with-{c}', 'NameController@boysAlphabet');
Route::get('/girl-names-starting-with-{c}', 'NameController@girlsAlphabet');
Route::get('/browse-baby-names-by-letter/{c}', 'NameController@namesAlphabet');
//popular and viewed names
Route::get('/most-popular-names', 'NameController@popularNames');
//user



Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider');
Route::get('access/{driver}', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback');
Route::get('/user', 'UserController@index')->middleware('verified');
Route::get('/user/profile', 'UserController@profile')->middleware('verified');
Route::post('/user/profile', 'UserController@update_avatar')->middleware('verified');
Route::get('/baby-names-list', 'UserController@lists');
Route::get('/collection', 'UserController@lists');
Route::get('/baby-names-list-{id}', 'UserController@list_view');
Route::get('/user/lists', 'UserController@lists');
Route::post('/user/lists', 'UserController@addList')->middleware('verified');
Route::get('/user/lists/view/{id}', 'UserController@list_view');
Route::get('/collection/{slug}', 'UserController@collection');

Route::get('/asma-ul-husna', 'PageController@asmaulHusna');
Route::get('/dua.php', 'PageController@dua');
//Route::post('/send', 'EmailController@send');

Route::resource('photos', 'GalleryController');
Route::get('/add-name-faces/{id}', 'GalleryController@face')->middleware('verified');

//admin
Route::group(['middleware' => ['auth','role:Admin'], 'prefix' => 'mypanel'], function () {
 //Dashboard Route
    Route::get('/mypanel/verify/{id}', 'Admin\NameController@verify');
    Route::get('/', 'Admin\AdminController@index');
    Route::get('/sitemap', 'Admin\AdminController@sitemap');
    Route::resource('/names', 'Admin\NameController');
    Route::resource('/details', 'Admin\DetailController');
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('users', 'Admin\UserController');
});
Route::get('/datatable/getdata', 'Admin\NameController@anyData');

Route::get('/get-counts', 'FavoriteController@getFavCount');
Route::get('get-info/{id}', 'ModalController@info');
