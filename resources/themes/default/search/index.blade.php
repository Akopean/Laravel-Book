@extends('theme::layouts.app')

@section('theme::breadcrumbs')
    {{ Breadcrumbs::render('search') }}
@endsection

@section('theme::content')

    <section id="search" class="alt">
        <form method="get" action=" http://laravel-teaching.local/search">
            <input type="text" name="q" id="q" placeholder="Search">
        </form>
    </section>
    <section>
        <header class="major">
            <h2>Ipsum sed dolor</h2>
        </header>
        <div class="posts">
            @isset($books)
                @foreach($books as $book)
                    <article>
                        <a href="{{ route('book', $book->slug) }}" class="image">
                            @if(isset($book->image))
                                <img src="{{ Voyager::image($book->thumbnail('small')) }}" style="width: 185px; height: 270px" alt=""/>
                            @else
                                <img src="/images/book.jpg" style="width: 185px; height: 270px" alt=""/>
                            @endif
                        </a>
                        <h3>{{ $book->title }}</h3>
                        <p>{!! $book->excerpt !!}</p>
                        <ul class="actions">
                            <li><a href="{{ route('book', $book->slug) }}" class="button">More</a></li>
                        </ul>
                    </article>
                @endforeach
            @endisset
        </div>
        @if ($books->hasPages())
            {{ $books->links('theme::partials.pagination') }}
        @endif
    </section>
@endsection
