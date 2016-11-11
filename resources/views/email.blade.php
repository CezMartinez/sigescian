<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>SIGESCIAN</title>
    <link rel="stylesheet" href="/css/template.css">
</head>
<body>
    <div class="page-container ">
        <div class="inner-block">
            @yield('content')
        </div>
    </div>
    <script src="/js/template.js"></script>
</body>
</html>