<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sigescian - Home</title>
        <link rel="stylesheet" href="/css/welcome.css">

        <link rel="stylesheet" href="/css/template.css">



    </head>
    <body>

    <div class="intro-header" style="background-image: url('{{ asset('/images/intro-bg.jpg')}}'); height: auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        @include('global.flash_message')
                        <h1>Gestión de Calidad</h1>
                        <h3>Centro de Investigaciones y Aplicaciones Nucleares</h3>
                        @if(!Auth::check())
                            <hr class="intro-divider">
                            <ul class="list-inline intro-social-buttons">
                                <li>
                                    <a href="/login" class="btn btn-primary btn-lg"><span class="network-name">Iniciar Sesión</span></a>
                                </li>

                            </ul>
                            @else
                                <hr class="intro-divider">
                                <ul class="list-inline intro-social-buttons">
                                    <li>
                                        <a href="/laboratorios" class="btn btn-primary btn-lg"><span class="network-name">Entrar al sistema</span></a>
                                    </li>

                                </ul>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <!-- /.container -->
        <p>© 2016 Grupo 18 DSI 215. Derechos Reservados</p>

    </div>


    <script src="/js/template.js"></script>

    </body>
</html>
