@if(!$books->isEmpty())
    <section>
        <header class="major">
            <h2>Recent News</h2>
        </header>
        <div class="mini-posts">
            @foreach($books as $book)
                <article>
                    <a href="#" class="image">

                        @if(isset($book->image))
                            <img src="{{ Voyager::image($book->thumbnail('small')) }}" style="width: 185px; height: 270px" alt=""/>
                        @else
                            <img src="/images/book.jpg" alt=""/>
                        @endif
                    </a>
                   {{ str_limit($book->excerpt, 55) }} ...
                    <ul class="actions">
                        <li>
                            <a href="{{ route('book', $book->slug) }}" class="button">More</a>
                        </li>
                    </ul>
                </article>
            @endforeach
        </div>
    </section>
@endisset