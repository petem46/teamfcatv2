<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UploadsController;
use Illuminate\Support\Facades\Route;

Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false
]);

Route::get('/gredirect', 'SocialAuthGoogleController@redirect');
Route::get('/gcallback', 'SocialAuthGoogleController@callback');
Route::get('/redirect', 'SocialAuthMSGraphController@redirect');
Route::get('/callback', 'SocialAuthMSGraphController@callback');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/get/pages/all', 'PagesController@getAll');
  Route::get('/gdpr', 'HomeController@gdpr')->name('gdpr');

  Route::get('/get/listsections/{area_id}', 'PagesController@getListSections');
  Route::get('/get/listpages/{area_id}', 'PagesController@getListPages');
  Route::get('/get/areadetails/{areaname}', 'PagesController@getAreaDetails');

  Route::get('/get/latestpages', 'PagesController@getLatest');

  Route::get('/get/seanslatestletter', 'PagesController@getSeansLatestLetter');

  Route::get('/get/userDetails','AppController@getUserDetails');
  Route::post('/post/userDetails/{id}','AppController@updateUserDetails');

  Route::get('/get/arealanding/{id}', 'PagesController@getAreaLanding');
  Route::put('/put/updateAreaLanding/{id}', 'PagesController@updateAreaLanding');

  Route::get('/get/allStaff', 'AppController@getAllStaff');

  Route::get('/get/page/content/{areaname}/{slug}', 'PagesController@getContent');
  Route::post('/post/savepage', 'PagesController@savePage');
  Route::post('/post/savepage2', 'PagesController@savePage2');

  Route::get('getpagetest/{id}', 'PagesController@test');

  // Route::get('/getTheFolders/{folder}', 'UploadsController@getTheFolders');
  Route::post('/getFolders', 'UploadsController@getFolders');
  Route::post('/makeFolder', 'UploadsController@makeFolder');
  Route::post('/upload', 'UploadsController@upload');

  //Delete a page based on id
  Route::delete('/delete/page/{id}', 'PagesController@delete');

  Route::get('/googlekeys/picker', 'AppController@getGPickerKeys');
  Route::get('/googlekeys/calendar', 'AppController@getGCalendarKey');
});
//GET GOOGLE KEYS

Route::get('/get/remotetlupdates', 'PagesController@getRemoteTLUpdates');
Route::post('/post/saveRTLUpdates', 'PagesController@postRemoteTLUpdates');
Route::get('/{any}', 'AppController@index')->where('any', '.*');

