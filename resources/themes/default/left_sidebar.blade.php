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
        {{ Widget::run('recentNews') }}
        <!-- Section -->
        {{ Widget::run('contactInfo') }}
        <!-- Section -->
        <!-- Footer -->
        <footer id="footer">
            {{ Widget::run('footerInfo') }}
        </footer>

    </div>
</div>
