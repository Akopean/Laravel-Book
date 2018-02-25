<div id="sidebar" class="sidebar">
    <div class="inner">

        <!-- Search -->
        <section id="search" class="alt">
            <form method="get" action=" {{ route('search') }}">
                <input type="text" name="q" id="q" placeholder="Search" />
            </form>
        </section>

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            {{ menu('category_left', 'theme::partials.left_menu') }}
        </nav>
        <!-- Section -->
            @WidgetGroup('leftSidebar', ['int'=>5])
        <!-- Section -->
        <footer id="footer">
            @WidgetGroup('footer', ['int'=>5])
        </footer>
    </div>
</div>
