<?php

use App\Http\Controllers\AcademyController;
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
Route::get('/get/vacancy/{id}', 'VacancyController@show')->name('join.show');
Route::get('/get/allInternalVacancies', 'VacancyController@index')->name('join');

Route::get('get/academy/{id}', 'AcademyController@getAcademybyId')->name('academy.get');

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

  Route::get('/get/draftInternalVacancies', 'VacancyController@getDrafts')->name('join.drafts');
  Route::get('/get/expiredInternalVacancies', 'VacancyController@getExpired')->name('join.expired');
  Route::get('/get/createVacancy', 'VacancyController@create')->name('join.create');
  Route::get('/get/payScales/{id}', 'VacancyController@getPayScaleRanges')->name('join.create.get.payscalerange');
  Route::get('/get/tlrs', 'VacancyController@getTLRs')->name('join.create.get.tlrs');

  Route::put('/put/updateVacancy/{id}', 'VacancyController@updateVacancy')->name('join.update');

  Route::post('/post/saveVacancy', 'VacancyController@save')->name('join.save');

  Route::get('/get/pages/all', 'PagesController@getAll');
  Route::get('/gdpr', 'HomeController@gdpr')->name('gdpr');

  Route::get('/get/listsections/{area_id}', 'PagesController@getListSections');
  Route::get('/get/listpages/{area_id}', 'PagesController@getListPages');
  Route::get('/get/areadetails/{areaname}', 'PagesController@getAreaDetails');

  Route::get('/get/latestpages', 'PagesController@getLatest');

  Route::get('/get/seanslatestletter', 'PagesController@getSeansLatestLetter');

  Route::get('/get/userDetails', 'AppController@getUserDetails');
  Route::post('/post/userDetails/{id}', 'UsersController@updateUserDetails');

  Route::get('/get/arealanding/{id}', 'PagesController@getAreaLanding');
  Route::put('/put/updateAreaLanding/{id}', 'PagesController@updateAreaLanding');

  Route::get('/get/allStaff', 'UsersController@getAllStaff');
  Route::get('/get/getSchools', 'UsersController@getSchools');
  Route::get('/get/getRoles', 'UsersController@getRoles');

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

  //GET GOOGLE KEYS
  Route::get('/googlekeys/picker', 'AppController@getGPickerKeys');
  Route::get('/googlekeys/calendar', 'AppController@getGCalendarKey');

  //RTL UPDATES
  Route::get('/get/remotetlupdates', 'PagesController@getRemoteTLUpdates');
  Route::post('/post/saveRTLUpdates', 'PagesController@postRemoteTLUpdates');

  Route::get('/{any}', 'AppController@index')->where('any', '.*');
});
