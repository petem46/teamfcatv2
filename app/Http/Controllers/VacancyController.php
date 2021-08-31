<?php

namespace App\Http\Controllers;

use App\Academy;
use App\Vacancy;
use App\SalaryPayScales;
use App\PayScaleRanges;
use App\Tlrs;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class VacancyController extends Controller
{
  public function index()
  {
    return Vacancy::whereDate('closingDate', '>=', date('Y-m-d'))->get()->map(function ($v) {
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
      'tlrs' => Tlrs::getTLRs(),
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
      // return redirect('/join')->with('success', 'New Vacancy Created');
      return response('New Vacancy Created', Response::HTTP_OK);
    } catch (QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == 1062) {
        return response('Beep boop bop! There is a problem!.', Response::HTTP_NOT_ACCEPTABLE)->header('error_code', $errorCode);
      } else {
        return response($e, Response::HTTP_NOT_ACCEPTABLE)->header('error_code', $errorCode);
      }
    }
  }

  public function show($id)
  {
    return Vacancy::find($id);
  }

  public function edit($id)
  {
    $vacancy = Vacancy::find($id);
    $data = [
      'vacancy' => $vacancy,
      'selectedAcademyDetails' => Academy::find($vacancy->academy_id),
      // 'selectedPayScaleDetails' => getPayScaleRanges($vacancy->details[''])
    ];
    return $data;
  }

  public function updateVacancy($id, Request $request)
  {
    try {

      $v = Vacancy::find($id);
      if ($v) {
        $v->academy_id = $request->get('academy_id');
        $v->closingDate = $request->get('closingDate');
        $v->closingDateFormatted = $request->get('closingDateFormatted');
        $v->details = $request->get('details');
        $v->touch();
        $v->save();
      }
      return response('Vacancy Edited Successfully', Response::HTTP_OK);
    } catch (QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == 1062) {
        return response('Beep boop bop! There is a problem!.', Response::HTTP_NOT_ACCEPTABLE)->header('error_code', $errorCode);
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
