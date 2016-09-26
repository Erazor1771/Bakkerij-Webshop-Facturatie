<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\News;
use View;
use DB;

class NewsController extends Controller
{

    /**
     * Get latest 3 News items from database
     * @return mixed
     */
    public function getLatestNews()
    {
        $news = News::orderBy('created_at')->take(3)->get();
        return View::make('homepage')->with('news', $news);
    }

    /**
     * Load a single news item
     *
     * @param $id
     * @return mixed
     */
    public function getNewsItem($id)
    {
        $news = News::where('id', $id)->get();
        return View::make('nieuws')->with('news', $news);
    }

    /**
     * Load the page: "Nieuws Overzicht"
     * @return mixed view
     */
    public function getNewsTablePage()
    {
        return View::make('admin.nieuws.overzicht');
    }

    /**
     * Load News Item from Database to fill table with
     * (angular request)
     * @return mixed
     */
    public static function loadNewsTable()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return $news;
    }

    /**
     * Load view for adding news items
     * @param Request $request
     * @return mixed admin.nieuws.toevoegen
     */
    public function addNewsView(Request $request)
    {
        if ($request->session()->has('admin')) {
            return View::make('admin.nieuws.toevoegen');
        } else {
            return Redirect::to('admin/loginscreen');
        }
    }

    public function addNewsItem(Request $request)
    {
        $heading = Input::get('titel');
        $img_path = Input::get('file');
        $html = Input::get('editor_contents');

        $img_path = "news/".$_FILES['file']['name'];

        DB::insert('insert into news (heading, img_path, html) values (?, ?, ?)',
            array($heading, $img_path, $html));

        $request->file->move(public_path('news'), $_FILES['file']['name']);

        // @ToDo : Resize images and check if file is not too large to upload

        return view('admin.nieuws.toevoegen');
    }

}
