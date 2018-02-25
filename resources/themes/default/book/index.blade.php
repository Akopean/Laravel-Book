@extends('theme::layouts.app')

@section('theme::content')
<section>
    <header class="main entry-header">
        <h1>{{ $book->title }}</h1>
    </header>
    <div class="entry-header">
        @if(isset($book->image))
            <img class="post_image" style="max-height: 420px" src="{{ Voyager::image($book->thumbnail('medium')) }}" alt="" />
        @else
            <img class="post_image" style="max-height: 420px" src="/images/book_medium.jpg" alt="" />
        @endif
        {!!  $book->body !!}
    </div>
</section>
@endsection
