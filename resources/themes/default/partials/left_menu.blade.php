<ul>
    @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}"> <i class="fa fa-folder-open"></i> {{ $menu_item->title }}</a>
        </li>
    @endforeach
</ul>
