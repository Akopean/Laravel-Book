@extends('theme::layouts.app')

@section('theme::content')
    @isset($banner_post)
        <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header>
                    <h1>{{ $banner_post->title }}</h1>
                    <span class="category-links">
                    @foreach($banner_post->tags as $tag)
                            <a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}@if(!$loop->last),@endif </a>
                        @endforeach
                    </span>
                </header>
                <p>{!! $banner_post->excerpt!!}</p>
                <ul class="actions">
                    <li><a href="{{ route('book', $banner_post->slug) }}" class="button big">Learn More</a></li>
                </ul>
            </div>
            <span class="image object">
            <a href="{{ route('book', $banner_post->slug) }}">
                @if(isset($banner_post->image))
                    <img src="{{ Voyager::image($banner_post->thumbnail('small')) }}" style="width: auto; height: 450px"
                         alt=""/>
                @else
                    <img src="/images/book_medium.jpg" style="width: auto; height: 450px" alt=""/>
                @endif

            </a>
        </span>
        </section>
        <!-- Section -->
    @endisset

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
                                <img src="{{ Voyager::image($book->thumbnail('medium')) }}"
                                     style="width: 185px; height: 270px" alt=""/>
                            @else
                                <img src="/images/book.jpg" style="width: 185px; height: 270px" alt=""/>
                            @endif
                        </a>
                        <h3>{{ $book->title }}</h3>
                        <div class="posted-on">
                            <i class="fa fa-calendar"></i>
                            <time class="entry-date published"
                                  datetime="{{ $book->created_at }}">{{ $book->created_at->format('M/d/Y') }}</time>
                        </div>
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
