<nav class="navigation" role="navigation">
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li><span class="button disabled">prev</span></li>
        @else
            <li><a class="button" href="{{ $paginator->previousPageUrl() }}" rel="prev">prev</a></li>
        @endif

    <!-- Pagination Elements -->
        @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li><span class="page">{{ $element }}</span></li>
            @endif

        <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="page active">{{ $page }}</span></li>
                    @else
                        <li><a class="page" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

    <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li><a  class="button" href="{{ $paginator->nextPageUrl() }}" rel="next">next</a></li>
        @else
            <li><span class="button disabled">next</span></li>
        @endif
    </ul>
</nav>
