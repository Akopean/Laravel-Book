@isset($soc_links)
    <ul class="icons">
        @foreach($soc_links as $key => $link)
            <li><a target="_blank" href="{{ $link }}" class="icon fa-{{ $key }}"><span class="label">{{ $key }}</span></a></li>
        @endforeach
    </ul>
@endisset
