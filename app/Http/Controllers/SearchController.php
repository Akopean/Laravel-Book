<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function index(Request $request) {
        $books = Book::where('slug', '=', Input::get('q'))
            ->orWhere('title', 'like', '%' . Input::get('q') . '%')
            ->orWhere('body', 'like', '%' . Input::get('q') . '%')
            ->published()->orderBy('created_at', 'DESC')->paginate(2);


        return view('theme::search.index', ['books' => $books]);
    }
}
