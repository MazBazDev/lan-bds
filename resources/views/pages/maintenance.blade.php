<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maintenance | BSD Ynov Lyon</title>
    <link rel="icon" href="{{ asset("assets/img/logobds.svg") }}" />


    <meta name="title" content="Maintenance | BSD Ynov Campus Lyon">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="row mx-auto text-center">
            <img id="logo" class="mx-auto" draggable="false" src="{{ asset('assets/img/logobds.svg') }}" alt="logo">
            <h1 class="mt-4">Le site revient bientôt !</h1>
        </div>
    </div>
    <style>
        body {
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica, Arial,
                sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        a {
            color: #fff;
        }
        #logo {
            max-width: 460px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<footer class="text-center py-4" style="color: #8f8ec0;">Made with <a href="{{ route('login') }}">❤️</a> by MazBaz</footer>
</html>