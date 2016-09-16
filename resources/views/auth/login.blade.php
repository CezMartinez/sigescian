<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="/css/template.css">
    <style>
        body{
            height: 100%;
            background: cornflowerblue;
        }
        .login-page{
            padding: 1em;
        }
        .login-head h1{
            padding: 1em;
        }
    </style>

</head>
<body>

    @include('global.flash_message')

    @include('auth.login1')

<script src="/js/template.js"></script>
</body>
</html>
