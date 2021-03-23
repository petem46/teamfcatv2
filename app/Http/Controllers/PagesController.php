<?php

namespace App\Http\Controllers;

use App\Page;
use App\Role;
use App\Section;
use App\Area;
use App\User;

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

  public function getListSections($area_id)
  {
    return $section = Section::select('id', 'title', 'link')->where('area_id', $area_id)->where('active', 1)->orderBy('created_at', 'DESC')->get();
  }

  public function getListPages($area_id)
  {
    $data = [
      'roles' => Role::all(),
      'sections' => Section::with('area')->with('page')->where('area_id', $area_id)->orderBy('created_at', 'DESC')->select('*', DB::raw("CONCAT('#',sections.id) as idlink"))->get(),
      'pages' => DB::table('pages')
        ->join('sections', 'sections.id', '=', 'pages.section_id')
        ->join('areas', function ($join) use ($area_id) {
          $join->on('areas.id', '=', 'sections.area_id')
            ->where('areas.id', '=', $area_id);
        })
        ->select('pages.*', DB::raw("CONCAT('/p2',areas.link,'/',pages.slug) as link"), 'sections.link as section_link', 'areas.id as area_id', 'areas.tealTitle as area_title')
        ->orderBy('pages.updated_at', 'desc')->get(),
    ];
    return $data;
  }

  public function getAll()
  {
    $pages = DB::table('pages')
      ->join('sections', 'sections.id', '=', 'pages.section_id')
      ->join('areas', 'areas.id', '=', 'sections.area_id')
      ->select('pages.title', 'sections.title as section_title', 'areas.link as area_link', 'areas.tealTitle as area_title', 'pages.jsoncontent', 'pages.slug')
      ->whereNull('pages.deleted_at')
      //hide premises pages
      ->where('pages.section_id', '!=', '8')
      ->get();
    foreach ($pages as $key => $page) {
      $page->content = json_decode($page->jsoncontent, true);
    }
    $data = [
      'pages1' => $pages,
    ];
    return $pages;
  }

  public function getLatest()
  {
    $data = [
      'latest' => DB::table('pages')
        ->join('sections', 'sections.id', '=', 'pages.section_id')
        ->join('areas', 'areas.id', '=', 'sections.area_id')
        // ->select('pages.*', DB::raw("CONCAT('/p2',areas.link,'/',pages.slug) as link"), 'sections.link as section_link', 'areas.id as area_id', 'areas.tealTitle as area_title')
        ->select('pages.title', 'pages.subtitle', 'pages.slug', DB::raw("CONCAT('/p2',areas.link,'/',pages.slug) as link"))
        ->where('pages.showinupdates', 1)
        ->orderBy('pages.updated_at', 'desc')->limit(5)->get(),
    ];
    return $data;
  }

  public function getRemoteTLUpdates()
  {
    $data = [
      'updates' => DB::table('pages')
        ->select('pages.title', 'pages.htmlcontent', 'pages.jsoncontent', 'pages.id')
        ->where('pages.id', '103')
        ->first(),
    ];
    return $data;
  }

  public function postRemoteTLUpdates(Request $request)
  {
    $updates = Page::find(103);
    $updates->htmlcontent = $request->get('htmlcontent');
    $updates->jsoncontent = $request->get('jsoncontent');
    $updates->touch();
    $updates->save();
    return response('Content Updated!!!', Response::HTTP_OK);
  }

  public function getSeansLatestLetter()
  {
    $data = [
      'seanslatestletter' => DB::table('pages')
        ->join('sections', 'sections.id', '=', 'pages.section_id')
        ->join('areas', 'areas.id', '=', 'sections.area_id')
        ->select('pages.title', 'pages.subtitle', 'pages.slug', DB::raw("CONCAT('/p2',areas.link,'/',pages.slug) as link"))
        ->where('pages.title', 'LIKE', "Sean's Letter %")
        ->orderBy('pages.created_at', 'desc')->first(),
    ];
    return $data;
  }

  public function test($slug)
  {
    return Page::with('section')->where('slug', $slug)->first();
  }

  public function getContent($section, $slug)
  {
    $prArr = [];
    $urArr = [];
    $pagecontent = '';
    if ($slug != 'newpage') {

      $user = User::with('role')->where('id', Auth::id())->first();
      $userRoles = $user->role;
      foreach ($userRoles as $key => $role) {
        array_push($urArr, $role->name);
      }
      $pageRoles = Page::with('role')->where('slug', $slug)->first();
      $pageRoles = $pageRoles->role;
      foreach ($pageRoles as $key => $role) {
        array_push($prArr, $role->name);
      }

      $accessChecker = array_intersect($prArr, $urArr);
    }

    if (empty($accessChecker) && $slug != 'newpage') {
      return "NOPE";
    }
    // if ($accessChecker) {
    $pagecontent = Page::with('role')->with('section')->where('slug', $slug)->first();
    if ($pagecontent) {
      $section_id = $pagecontent->section_id;
    }
    // }
    if ($slug == 'newpage' && !User::hasRole($section)) {
      return "NOPE";
    }
    if ($slug == 'newpage' && User::hasRole($section)) {
      $section_id = Area::select('id')->where('name', $section)->first();
      $section_id = $section_id->id;
    }
    return $data = [
      'pagecontent' => $pagecontent,
      'roles' => Role::get(),
      'sections' => Section::select('id', 'title', 'link')->where('area_id', $section_id)->where('active', 1)->orderBy('created_at', 'DESC')->get(),
      'sidemenuitems' => Page::select('slug', 'title')->with('section')->where('section_id', $section_id)->get(),
      'section_id' => $section_id,
    ];
  }

  public function savePage2(Request $request)
  {
    $subtitle = '';
    $pagetype = '';
    if ($request->get('subtitle') != 'null') {
      $subtitle = $request->get('subtitle');
    }
    if ($request->get('pagetype_id') != 'null') {
      $pagetype = $request->get('pagetype_id');
    }
    $uid = $request->get('uid');
    if (!$uid) {
      $uid = Auth::id();
    }
    if (!$uid) {
      $uid = 1;
    }

    // dd($request);

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
        $page->showinupdates = $request->get('showinupdates');
        $page->user_id = $uid;
        $page->touch();
        $page->save();

        if (!empty($request->get('role'))) {
          $page->role()->detach();
          foreach ($request->get('role') as $role) {
            $page->role()->attach($role);
          }
        }

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
          'showinupdates' => $request->get('showinupdates'),
          'user_id' => $uid,
        ]);

        if (!empty($request->get('role'))) {
          $page->role()->detach();
          foreach ($request->get('role') as $role) {
            $page->role()->attach($role);
          }
        }
        return response('New Page Created', Response::HTTP_OK)->header('page_id', $newpage->id);
      }
    } catch (QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == 1062) {
        return response('A page with this TITLE or PAGE LINK already exists.', Response::HTTP_NOT_ACCEPTABLE)->header('error_code', $errorCode);
      }
    }
  }

  public function delete($id)
  {
    $page = Page::find($id);
    if ($page) {
      $page->delete();
    }
    return response('New Page Created', Response::HTTP_OK)->header('section_id', $page->section_id);
  }
}
