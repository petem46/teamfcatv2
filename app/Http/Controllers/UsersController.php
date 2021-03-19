<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\User;
use App\Role;

class UsersController extends Controller
{
  public function index()
  {
    $data = [
      'users' => User::all(),
      'roles' => Role::all(),
    ];
    return view('users.index', $data);
  }

  public function getAllStaff()
  {
    return User::with('role')->get();
  }

  public function getRoles()
  {
    return Role::get();
  }

  public function getSchools()
  {
    $data = [
      'schools' => User::select('school')->groupBy('school')->orderBy('school')->get(),
    ];
    return $data;
  }

  public function edit($id)
  {
    $data = [
      'user' => User::with('role')->with('school')->find($id),
      'roles' => Role::orderBy('role')->get(),
      // 'schools' => School::orderBy('name')->get(),
      'checkedroles' => Role::select('id', 'role')->whereHas('user', function ($q) use ($id) {
        $q->where('id', $id);
      })->get(),
      // 'checkedschools' => School::select('id', 'name')->whereHas('user', function ($q) use ($id) {
      //   $q->where('id', $id);
      // })->get(),
    ];
    // dd($data);
    return view('users.edit', $data);
  }

  public function updateUserDetails(Request $request, $id)
  {
    // dd($request->get('keyrole'));
    $user = User::find($id);
    if ($user) {
      $user->keyrole = $request->get('keyrole');
      $user->twitterHandle = $request->get('twitterHandle');
      $user->ext = $request->get('ext');
      $user->mobile = $request->get('mobile');
      $user->touch();
      $user->save();

      // if (!empty($request->get('checkedschools'))) {
      //   $user->school()->detach();
      //   foreach ($request->get('checkedschools') as $school) {
      //     $user->school()->attach($school);
      //   }
      // }

      if (!empty($request->get('role'))) {
        $user->role()->detach();
        foreach ($request->get('role') as $role) {
          $user->role()->attach($role['id']);
        }
      }
      return response('User Updated Successfully', Response::HTTP_OK)->header('section_id', $user->id);
    }
  }

  public function destroy($id)
  {
    $user = User::find($id)->delete();
    return redirect('/users')->with('success', 'User Deleted');
  }
}
