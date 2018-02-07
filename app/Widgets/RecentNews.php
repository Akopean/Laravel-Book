<?php

namespace App\Widgets;

use App\Book;
use Arrilot\Widgets\AbstractWidget;

class RecentNews extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [

    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $books = Book::where('featured', true)->published()->orderBy('created_at', 'DESC')->take(5)->get();

        return view('theme::widgets.recent_news', ['books' =>  $books]);
    }
}