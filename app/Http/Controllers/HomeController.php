<?php

namespace App\Http\Controllers;

use App\Book;
use App\CustomField;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {

        $books = Book::published()->orderBy('created_at', 'DESC')->paginate(3);
        $banner_post = $books->shift();

        return view('theme::home.index', ['books' => $books, 'banner_post' => $banner_post]);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request,['key' => 'required']);
        return dd($request);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function delete(Request $request)
    {

        return "delete";
    }
}
