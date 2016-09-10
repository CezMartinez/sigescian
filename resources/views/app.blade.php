<html>
<head>
    <title>SIGESCIAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="/css/template.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="page-container">
    <div class="left-content">
        @include('global.header')

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
<script src="/js/template.js"></script>
<script src="/js/vue.js"></script>
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
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }
        toggle = !toggle;
    });
</script>

</body>
</html>