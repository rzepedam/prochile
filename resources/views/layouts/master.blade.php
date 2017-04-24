<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ProChile | @yield('title') </title>
        <link rel="stylesheet" href="{!! asset('css/inspinia.css') !!}" />
        <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
        @yield('css')
    </head>
    <body class="pace-done skin-3">
        <div id="wrapper">

            @include('layouts.sections.sidebar')

            <div id="page-wrapper" class="gray-bg dashbard-1">

                @include('layouts.sections.nav')

                @include('layouts.sections.header')

                <div class="wrapper wrapper-content">

                    @yield('content')

                </div>

                @include('layouts.sections.footer')

            </div>

        </div>

        <script src="{!! asset('js/inspinia.js') !!}" type="text/javascript"></script>
        @yield('scripts')

    </body>
</html>