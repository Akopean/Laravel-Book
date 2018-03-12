<ul class="nav navbar-nav">
    @foreach ($items as $item)
        @php
            $transItem = $item;

            if (Voyager::translatable($item)) {
                $transItem = $item->translate($options->locale);
            }
            $href = $item->link(true);
        @endphp
        <li>
            @if(!$item->children->isEmpty())
                <span  class="opener">
                    <i class="fa fa-folder-open"></i>{{ $transItem->title }}
                </span>
                @include('theme::partials.vertical_menu', ['items' => $item->children, 'innerLoop' => true])
            @else

                <a href="{{ $href }}"> <i class="fa fa-folder-open"></i> {{ $item->title }}</a>
           @endif
        </li>
    @endforeach
</ul>
