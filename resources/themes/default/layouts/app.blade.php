<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting('site.title') }}</title>

        <!--[if lte IE 8]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/babel-core/6.1.19/browser.min.js" /><![endif]-->
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <main role="main" id="main">
            <div class="inner">

                <!-- Header -->
                @include('theme::header')

                <!-- Section -->
                @yield('theme::content')

            </div>
        </main>

        <!-- Sidebar -->
        @include('theme::left_sidebar')
    </div>
    <!-- Scripts -->
    <script src="/js/library/skel.min.js"></script>
    <!--[if lte IE 8]><script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>