<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sigescian</title>
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
    <div class="page-container">
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
    <script src="/js/vue.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3500).fadeOut(350);
    </script>

</body>
</html>