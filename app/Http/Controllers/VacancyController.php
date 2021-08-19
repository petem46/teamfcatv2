<?php

namespace App\Http\Controllers;

use App\Academy;
use App\Vacancy;
use App\SalaryPayScales;
use App\PayScaleRanges;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class VacancyController extends Controller
{
  public function index()
  {
    return Vacancy::all()->map(function ($v) {
      return [
        'id' => $v->id,
        'academy_id' => $v->academy_id,
        'details' => json_decode($v->details),
        'closingDate' => $v->closingDate,
        'closingDateFormatted' => $v->closingDateFormatted,
      ];
    });
  }

  public function create()
  {
    $data = [
      'academies' => Academy::all()->map(function ($academy) {
        return [
          'value' => $academy->id,
          'label' => $academy->name,
          'id' => $academy->id,
          'name' => $academy->name,
          'icon' => $academy->logourl,
          'about' => $academy->about,
          'color' => $academy->color,
        ];
      }),
      'salaryscales' => SalaryPayScales::all(),

    ];
    return $data;
  }

  public function save(Request $request)
  {
    try {
      $new = Vacancy::create([
        'academy_id' => $request->get('academy_id'),
        'closingDate' => $request->get('closingDate'),
        'closingDateFormatted' => $request->get('closingDateFormatted'),
        'details' => $request->get('details'),
      ]);
      return response('New Page Created', Response::HTTP_OK);
    } catch (QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == 1062) {
        return response('A page with this TITLE or PAGE LINK already exists.', Response::HTTP_NOT_ACCEPTABLE)->header('error_code', $errorCode);
      } else {
        return response($e, Response::HTTP_NOT_ACCEPTABLE)->header('error_code', $errorCode);
      }
    }
  }

  public function getPayScaleRanges($id)
  {
    return PayScaleRanges::all()->where('salary_pay_scale_id', $id)->map(function ($psr) {
      return [
        'id' => $psr->id,
        'grade' => $psr->grade,
        'range' => $psr->points,
        'details' => $psr->grade . ', Points: ' . $psr->points
      ];
    });
  }
}