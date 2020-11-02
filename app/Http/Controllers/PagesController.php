<?php

namespace App\Http\Controllers;

use App\Page;
use App\Section;
use App\Area;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
  public function getAreaDetails($name)
  {
    return Area::where('name', $name)->first();
  }

  public function getAreaLanding($name)
  {
    return $sectionLandingContent = Area::where('name', $name)->first();
  }

  public function updateAreaLanding($id, Request $request)
  {
    $area = Area::find($id);
    if ($area) {
      $area->title = $request->get('title');
      $area->tealTitle = $request->get('tealTitle');
      $area->subTitle = $request->get('subTitle');
      $area->welcomeSubText = $request->get('welcomeSubText');
      $area->landingImage = $request->get('landingImage');
      $area->actioncards = $request->get('actioncards');
      $area->buttons = $request->get('buttons');
      $area->touch();
      $area->save();
      return response('Page Updated!!!', Response::HTTP_OK)->header('section_id', $area->id);
    }
    return 'NO OKAY';
  }

  public function getListSections($area_id) {
    return $section = Section::select('id','title', 'link')->where('area_id', $area_id)->where('active', 1)->orderBy('created_at', 'DESC')->get();
  }

  public function getListPages($area_id)
  {
    $data = [
      'sections' => Section::with('area')->with('page')->where('area_id', $area_id)->orderBy('created_at', 'DESC')->select('*', DB::raw("CONCAT('#',sections.id) as idlink"))->get(),
      'pages' => DB::table('pages')
                  ->join('sections','sections.id','=','pages.section_id')
                  ->join('areas', function($join) use($area_id) {
                    $join->on('areas.id','=','sections.area_id')
                      ->where('areas.id', '=', $area_id);
                  })
                  ->select('pages.*', DB::raw("CONCAT('/p2',areas.link,'/',pages.slug) as link"), 'sections.link as section_link', 'areas.id as area_id', 'areas.tealTitle as area_title')
                  ->get(),
    ];
    return $data;
  }

  public function test($slug)
  {
    return Page::with('section')->where('slug', $slug)->first();
  }

  public function getContent($section, $slug)
  {
    $pagecontent = Page::with('section')->where('slug', $slug)->first();
    if ($pagecontent) {
      $section_id = $pagecontent->section_id;
    }
    if ($slug == 'newpage') {
      $section_id = Section::select('id')->where('name', $section)->first();
      $section_id = $section_id->id;
    }
    return $data = [
      'pagecontent' => $pagecontent,
      'sections' => Section::get(),
      'sidemenuitems' => Page::with('section')->where('section_id', $section_id)->get(),
      'section_id' => $section_id,
    ];
  }

  public function savePage2(Request $request)
  {
    $subtitle = '';
    if($request->get('subtitle') != 'null') {
      $subtitle = $request->get('subtitle');
    }
    $uid = $request->get('uid');
    if (!$uid) {
      $uid = Auth::id();
    }
    if (!$uid) {
      $uid = 1;
    }
    $page = Page::find($request->get('id'));
    try {

      if ($page) {
        $page->section_id = $request->get('section_id');
        $page->title = $request->get('title');
        $page->subtitle = $subtitle;
        $page->slug = $request->get('slug');
        $page->htmlcontent = $request->get('htmlcontent');
        $page->jsoncontent = $request->get('jsoncontent');
        // $page->state_id = $request->get('state_id');
        $page->user_id = $uid;
        $page->touch();
        $page->save();
        return response('Page Updated', Response::HTTP_OK)->header('page_id', $page->id);
      } else {
        $newpage = Page::create([
          'section_id' => $request->get('section_id'),
          'title' => $request->get('title'),
          'subtitle' => $subtitle,
          'slug' => $request->get('slug'),
          'htmlcontent' => $request->get('htmlcontent'),
          'jsoncontent' => $request->get('jsoncontent'),
          'state_id' => 1,
          'user_id' => $uid,
        ]);
        return response('New Page Created', Response::HTTP_OK)->header('page_id', $newpage->id);
      }
    } catch (QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == 1062) {
        return response('A page with this TITLE or PAGE LINK already exists.', Response::HTTP_NOT_ACCEPTABLE)->header('error_code', $errorCode);
      }
    }
  }

  public function delete($id) {
    $page = Page::find($id);
    if($page) {
      $page->delete();
    }
    return response('New Page Created', Response::HTTP_OK)->header('section_id', $page->section_id);
  }
}
