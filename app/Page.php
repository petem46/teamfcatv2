<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
  use SoftDeletes;

  protected $fillable = ['section_id', 'title', 'subtitle', 'pagetype_id', 'slug', 'htmlcontent', 'jsoncontent', 'state_id', 'showinupdates', 'user_id'];

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
  public function role()
  {
    return $this->belongsToMany('App\Role');
  }
}
