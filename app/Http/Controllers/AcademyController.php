<?php


namespace App\Http\Controllers;

use App\Academy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
  public function getAcademybyId($id)
  {
    return Academy::find($id);
  }
}
