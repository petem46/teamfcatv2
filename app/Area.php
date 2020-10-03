<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name', 'active'
  ];

  public function section()
  {
    return $this->hasMany('App\Section');
  }
}
