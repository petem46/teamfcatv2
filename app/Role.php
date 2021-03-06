<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'role',
  ];

  public function user()
  {
    return $this->belongsToMany('App\User');
  }
  public function page()
  {
    return $this->belongsToMany('App\Page');
  }
}
