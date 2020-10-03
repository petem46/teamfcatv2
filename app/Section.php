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
    'active',
    'title',
    'tealTitle',
    'subTitle',
    'welcomeSubtext',
    'link',
    'landingImage',
    'landingImageCaption',
    'buttons',
    'actioncards',
  ];

  protected $casts = [
    'buttons' => 'array',
    'actioncards' => 'array'
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
