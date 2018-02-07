<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class CategoryController extends Controller
{
    /**
     * @param $categorySlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($categorySlug)
    {
       $category = Category::where('slug', $categorySlug)->firstOrFail();

        $books = Book::whereHas('category', function ($query) use ($category) {
            $query->where('slug', 'like', $category->slug);
        })->published()->orderBy('created_at', 'DESC')->paginate(2);

        return view('theme::category.index', ['books' => $books, 'category' => $categorySlug]);
    }
}
