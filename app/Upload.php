<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
class Upload extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name',
      'filename',
      'folder',
      'path',
      'type',
      'size',
  ];

  public function getAllFolders($directory) {
    return $directories = Storage::allDirectories($directory);
  }

  public function getSubFolders($directory) {
    return $directories = Storage::directories($directory);
  }

}
