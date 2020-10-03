<?php

namespace App\Http\Controllers;

use DB;
use App\Upload;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManager;

class UploadsController extends Controller
{

  public function getFolders(Request $request)
  {
    // $manager = new ImageManager(array('driver' => 'imagick'));
    $directory = $request->get('folder');
    $dirFiles = Upload::where('folder', $directory)->get();
    for ($i = 0; $i < (sizeof($dirFiles)); $i++) {
      if($dirFiles[$i]['type'] == 'image/jpeg') {
      // $dirFiles[$i]['noodle'] = $manager->make($dirFiles[$i]['path'])->resize(300, 200)->save();
      }
      $dirFiles[$i]['url'] = url($dirFiles[$i]['path']);
    }
    return $data = [
      // 'allFolders' => DB::table('uploads')->select('folder', DB::raw('count(*) as filecount'))->groupBy('folder')->get(),
      'allFolders' => Storage::allDirectories('public/uploads'),
      'subFolders' => Storage::directories('public/' . $directory),
      'dirFiles' => $dirFiles,
    ];
  }


  // public function getTheFolders($directory)
  // {
  //   // $directory = 'pete';
  //   return $data = [
  //     'allFolders' => Storage::allDirectories('public/uploads'),
  //     'subFolders' => Storage::directories('public/uploads/' . $directory),
  //     'dirFiles' => Storage::allFiles('public/uploads/' . $directory),
  //   ];
  // }

  public function makeFolder(Request $request) {
    // dd($request->get('newFolder'));
    $directory = $request->get('newFolder');
    $go = Storage::makeDirectory($directory);
    return response('New Folder Created', Response::HTTP_OK);
  }

  public function upload(Request $request)
  {
    if ($request->hasFile('file')) {
      $file = $request->file('file');
      $filename = $request->file->getClientOriginalName();
      $name = $request->get('name');
      $type = $request->get('type');
      $size = $request->file('file')->getSize();
      $folder = $request->get('folder');
      $store = $file->storeAs('/public/' . $folder, $filename);
      $path = 'storage/' . $folder . '/' . $filename;

      $upload = Upload::create([
        'name' => $name,
        'filename' => $filename,
        'folder' => $folder,
        'path' => $path,
        'type' => $type,
        'size' => $size,
      ]);

      return response()->json(['src' => Storage::url($folder . '/' . $filename), 'text' => 'Image Uploaded']);
    } else {
      return "BOOP";
    }
  }
}
