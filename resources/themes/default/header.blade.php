<header id="header">
    <a href="/" class="logo">{{ setting('site.title') }}</a>
    {{ Widget::run('socialLinks') }}
</header>

@yield('theme::breadcrumbs')
