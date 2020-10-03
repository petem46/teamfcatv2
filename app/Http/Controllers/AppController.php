<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('/home');
    }
}
