<html>
<head>
    <title>SIGESCIAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="/js/all.js"></script>
    <link href="/css/all.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="page-container">
    <div class="left-content">
        @include('global.header')
        <script>
            $(document).ready(function() {
                var navoffeset=$(".header-main").offset().top;
                $(window).scroll(function(){
                    var scrollpos=$(window).scrollTop();
                    if(scrollpos >=navoffeset){
                        $(".header-main").addClass("fixed");
                    }else{
                        $(".header-main").removeClass("fixed");
                    }
                });

            });
        </script>
        <div class="inner-block">
            <!-- Aqui ira la maquetacion-->
            @yield('content')
        </div>
        @include('global.footer')
    </div>
    <!-- Menu lateral-->
    @include('global.nav')
</div>




<!--scrolling js-->
<script src="/js/all.js"></script>
<script src="/js/app.js"></script>

</body>
</html>