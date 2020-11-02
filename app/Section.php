<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'area_id',
    'name',
    'title',
    'subTitle',
    'active',
  ];

  public function area()
  {
    return $this->belongsTo('App\Area');
  }
  public function page()
  {
    return $this->hasMany('App\Page');
  }
}
