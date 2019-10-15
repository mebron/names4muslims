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

Auth::routes(['verify' => true]);

Route::get('/baby-names', 'NameController@index');
Route::get('/baby-names/muslim-girl-names', 'NameController@girls');
Route::get('/baby-names/muslim-boy-names', 'NameController@boys');
Route::get('/name/{slug}.html', 'NameController@info');
Route::get('/search', 'SearchController@search');
//static pages
Route::get('/aqeeqa.html', 'PageController@aqeeqa');
Route::get('/circumcision.html', 'PageController@circumcision');
Route::get('/why-muslims-looking-for-meaning-of-name.html', 'PageController@tasmiyah');
Route::get('/privacy.html', 'PageController@privacy');
Route::get('/contacts.html', 'ContactController@index');
Route::post('contact-us', 'ContactController@SendContact');
Route::get('comments.html', function () {
    return view('pages.comments');
});
//random names
Route::get('/baby-names/random-baby-names', 'NameController@randomNames');
Route::get('/baby-names/random-girl-names', 'NameController@randomGirls');
Route::get('/baby-names/random-boy-names', 'NameController@randomBoys');
//short names
Route::get('/baby-names/short-muslim-baby-names', 'ShortNameController@index');
Route::get('/baby-names/three-letter-boy-names', 'ShortNameController@threeLetterBoys');
Route::get('/baby-names/three-letter-girl-names', 'ShortNameController@threeLetterGirls');
Route::get('/baby-names/four-letter-boy-names', 'ShortNameController@fourLetterBoys');
Route::get('/baby-names/four-letter-girl-names', 'ShortNameController@fourLetterGirls');
Route::get('/baby-names/five-letter-boy-names', 'ShortNameController@fiveLetterBoys');
Route::get('/baby-names/five-letter-girl-names', 'ShortNameController@fiveLetterGirls');
//favorites
Route::post('/favorite/{name}', 'FavoriteController@favorite');
Route::post('/unfavorite/{name}', 'FavoriteController@unFavorite');
Route::post('/favoritetemp/{name}', 'FavoriteController@favoriteTemp');
Route::post('/unfavoritetemp/{name}', 'FavoriteController@unFavoriteTemp');
Route::post('/isfavorited/{name}', 'FavoriteController@isFavorited');
Route::get('/favorite-names.html', 'FavoriteController@index');
Route::get('/baby-names/most-favorited-muslim-baby-names', 'FavoriteController@favorited');
Route::post('/send-my-favorite-names', 'FavoriteController@sendIt');
Route::post('/send-saved-names', 'FavoriteController@sendSaved');
Route::get('/favorite/download', 'FavoriteController@download');
//Route::get('/ajax/my/favorites/{id}', 'FavoriteController@ajax');
Route::get('get-favorites', 'FavoriteController@getFavorites');
Route::delete('/delete-my-saved-names/{id}', 'FavoriteController@deleteSaved');
//names by letters
Route::get('/baby-names/boy-names-by-letter.html', 'NameController@boysLetters');
Route::get('/baby-names/girl-names-by-letter.html', 'NameController@girlsLetters');
Route::get('/baby-names/boy-names-starting-with-{c}', 'NameController@boysAlphabet');
Route::get('/baby-names/girl-names-starting-with-{c}', 'NameController@girlsAlphabet');
Route::get('/baby-names/browse-baby-names-by-letter/{c}', 'NameController@namesAlphabet');
//popular and viewed names
Route::get('/baby-names/most-popular-names', 'NameController@popularNames');
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

Route::get('/asma-ul-husna', function (App\AsmaulHusna $ism) {
    $names = $ism->all();
    SEO::setTitle('99 Beautiful names of Allah');
    SEO::setDescription("Asma means names, and husna means beautiful. Thus asma al husna means the beautiful names of Allah Subhanah");
    return view('names.asma_ul_husna', compact('names'));
});

Route::get('/dua.php', function (App\Dua $dua) {
    $duas = $dua->all();

    SEO::setTitle('Islamic duas');
    SEO::setDescription("Islamic Duas for our Childrens and Parents");
    return view('names.dua', compact('duas'));
});
//Route::post('/send', 'EmailController@send');

Route::resource('photos', 'GalleryController');
Route::get('/add-name-faces/{id}', 'GalleryController@face')->middleware('verified');

//admin
Route::group(['middleware' => ['auth','role:Admin'], 'prefix' => 'mypanel'], function () {
 //Dashboard Route
    Route::get('/', 'Admin\AdminController@index');
    Route::get('/sitemap', 'Admin\AdminController@sitemap');
    Route::resource('/names', 'Admin\NameController');
    Route::resource('/details', 'Admin\DetailController');
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('users', 'Admin\UserController');
});
Route::get('/datatable/getdata', 'Admin\NameController@anyData');
Route::get('/mypanel/verify/{id}', 'Admin\NameController@verify')->middleware('verified');
Route::get('/get-counts', 'FavoriteController@getFavCount');
Route::get('get-info/{id}', 'ModalController@info');
