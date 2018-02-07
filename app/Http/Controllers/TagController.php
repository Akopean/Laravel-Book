<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Tag;

class TagController extends Controller
{
    /**
     * @param $tagSlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($tagSlug)
    {
        $tag = Tag::where('slug', $tagSlug)->firstOrFail();

        $books = Book::whereHas('tags', function ($query) use ($tag) {
            $query->where('slug', 'like', $tag->slug);
        })->published()->orderBy('created_at', 'DESC')->paginate(2);

        return view('theme::tag.index', ['books' => $books, 'tag' => $tag]);
    }
}
