<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tlrs extends Model
{
  use SoftDeletes;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'amount', 'active'
  ];

  static function getTLRs()
  {
    return Tlrs::where('active', 1)->orderBy('id', 'desc')->get()->map(function ($tlr) {
      return [
        'id' => $tlr->id,
        'name' => $tlr->name,
        'amount' => $tlr->amount,
        'label' => 'TLR ' . $tlr->name
      ];
    });
  }
}
