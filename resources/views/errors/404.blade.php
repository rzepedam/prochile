<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/prochile.png">
    <title>ProChile | 404 Error </title>
    <link rel="stylesheet" href="{{ mix('css/inspinia.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>

<body class="gray-bg">
    <div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">Page Not Found</h3>

        <div class="error-desc">
            Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
            <form class="form-inline m-t" role="form">
                <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </form>
        </div>
    </div>

    <script src="{{ mix('js/inspinia.js') }}" type="text/javascript"></script>
</body>
</html>
