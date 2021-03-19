<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppController extends Controller
{
  public function index()
  {
    return view('/home');
  }

  public function getUserDetails()
  {
    $user_id = Auth::id();
    return User::with('role')->find($user_id);
  }

  public function updateUserDetails($id, Request $request)
  {
    $user = User::find($id);
    if ($user) {
      $user->keyrole = $request->get('keyrole');
      $user->twitterHandle = $request->get('twitterHandle');
      $user->ext = $request->get('ext');
      $user->mobile = $request->get('mobile');
      $user->touch();
      $user->save();
      return response('User Updated!!!', Response::HTTP_OK)->header('section_id', $user->id);
    }
  }


  public function getGPickerKeys()
  {
    $keys = [
      'developerKey' => config('services.google.picker_api_key'),
      'clientId' => config('services.google.client_id'),
      'googleCalendarApiKey' => config('services.google.calendar_api_key'),
    ];
    return $keys;
  }

  public function getGCalendarKey()
  {
    $keys = [
      'googleCalendarApiKey' => config('services.google.calendar_api_key'),
    ];
    return $keys;
  }
}
