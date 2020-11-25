<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
  use SoftDeletes;

  protected $fillable = ['section_id', 'title', 'subtitle', 'pagetype_id', 'slug', 'htmlcontent', 'jsoncontent', 'state_id', 'user_id'];

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
