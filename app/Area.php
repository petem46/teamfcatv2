<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
  use SoftDeletes;

  protected $fillable = [
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

  public function section()
  {
    return $this->hasMany('App\Section');
  }
}
