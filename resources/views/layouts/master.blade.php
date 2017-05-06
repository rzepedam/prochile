<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="/img/prochile.png">
        <title>ProChile | @yield('title') </title>
        <link rel="stylesheet" href="{{ mix('css/inspinia.css') }}" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        @yield('css')
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
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

                {{--@include('layouts.partials.footer')--}}

            </div>
        </div>

        <script src="{{ mix('js/inspinia.js') }}" type="text/javascript"></script>
        @yield('scripts')
        @include('layouts.toastr.success')
    </body>
</html>
