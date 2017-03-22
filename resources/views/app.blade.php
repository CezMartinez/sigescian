<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>SIGESCIAN</title>
    <link rel="icon" type="image/png" href="/images/icon.png" />
    <link rel="stylesheet" href="/css/template.css">

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar(){
            window.scrollTo(0,1);
        }
    </script>
</head>
<body>
    <div class="page-container ">
        <div class="left-content">
            <div class="mother-grid-inner">

                @include('global.header')

                <div class="inner-block">

                    @include('global.flash_message')

                    @yield('content')

                </div>

                @include('global.footer')
            </div>
        </div>
        @include('global.nav')
    </div>


    <script src="/js/template.js"></script>

    @yield('scripts')

</body>
</html>