<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index($bookSlug)
    {
        $book = Book::where('slug', $bookSlug)->published()->firstorfail();

        return view('theme::book.index', ['book' => $book]);
    }
}
