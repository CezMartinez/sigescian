<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/template.css">
        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>

    <div class="container">
        <users list="{{ $users }}" method="DELETE" token="{{csrf_token()}}"></users>
    </div>
    <script src="/js/vue.js"></script>
    </body>
</html>
