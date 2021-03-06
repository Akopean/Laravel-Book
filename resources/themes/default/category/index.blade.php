@extends('theme::layouts.app')

@section('theme::breadcrumbs')
    {{ Breadcrumbs::render('category', $category) }}
@endsection

@section('theme::content')

    <!-- Popular Tech. -->
    @include('theme::partials.popular_technology')
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
                        <span class="category-links">
                            @foreach($book->tags as $tag)
                                <a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}@if(!$loop->last),@endif </a>
                            @endforeach
                        </span>
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
