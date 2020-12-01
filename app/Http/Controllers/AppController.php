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

    public function getUserDetails() {
      return Auth::user();
    }

    public function updateUserDetails($id, Request $request) {
        $user = User::find($id);
      if($user) {
        $user->keyrole = $request->get('keyrole');
        $user->twitterHandle = $request->get('twitterHandle');
        $user->ext = $request->get('ext');
        $user->mobile = $request->get('mobile');
        $user->touch();
        $user->save();
        return response('User Updated!!!', Response::HTTP_OK)->header('section_id', $user->id);
      }
    }

    public function getAllStaff() {
      return User::all();
    }
}
