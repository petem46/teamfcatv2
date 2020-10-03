<?php

namespace App\Http\Controllers;

use App\Page;
use App\Section;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;

class PagesController extends Controller
{
  public function getSectionLanding($name)
  {
    return $sectionLandingContent = Section::where('name', $name)->first();
  }

  public function updateSectionLanding($id, Request $request)
  {
    $section = Section::find($id);
    if ($section) {
      $section->title = $request->get('title');
      $section->tealTitle = $request->get('tealTitle');
      $section->subTitle = $request->get('subTitle');
      $section->welcomeSubText = $request->get('welcomeSubText');
      $section->actioncards = $request->get('actioncards');
      $section->touch();
      $section->save();
      return response('Page Updated!!!', Response::HTTP_OK)->header('section_id', $section->id);
    }
    return 'NO OKAY';
  }

  public function getListPages($id)
  {
    return $pages = Page::where('section_id', $id)->orderBy('created_at', 'DESC')->get();
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

  public function savePage(Request $request)
  {
    $uid = $request->get('uid');
    if (!$uid) {
      $uid = Auth::id();
    }
    if (!$uid) {
      $uid = 1;
    }
    $page = Page::find($request->get('id'));
    return ('WUT DA FLOOP');
    try {
      if ($page) {
        $page->section_id = $request->get('section_id');
        $page->title = $request->get('title');
        $page->subtitle = $request->get('subtitle');
        $page->slug = $request->get('slug');
        $page->htmlcontent = $request->get('htmlcontent');
        $page->jsoncontent = $request->get('jsoncontent');
        $page->state_id = $request->get('state_id');
        $page->user_id = $uid;
        $page->touch();
        $page->save();
        // return response('Page Updated!!!', Response::HTTP_OK)->header('page_id', $page->id);
      } else {
        $newpage = Page::create([
          'section_id' => $request->get('section_id'),
          'title' => $request->get('title'),
          'subtitle' => $request->get('subtitle'),
          'slug' => $request->get('slug'),
          'htmlcontent' => $request->get('htmlcontent'),
          'jsoncontent' => $request->get('jsoncontent'),
          'state_id' => $request->get('state_id'),
          'user_id' => $uid,
          // 'slug' => $request->get('slug'),
        ]);
        // return response('New Page Created', Response::HTTP_OK)->header('page_id', $newpage->id);
      }
    } catch (\Illuminate\Database\QueryException $e) {
      return "error" . $e;
      // return response('houston, we have a duplicate entry problem', Response::HTTP_NOT_ACCEPTABLE);
    }
  }

  public function savePage2(Request $request)
  {
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
        $page->subtitle = $request->get('subtitle');
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
          'subtitle' => $request->get('subtitle'),
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
}
