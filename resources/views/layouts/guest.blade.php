<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="title" content="@yield('title') | YPARTY BDE/BDS Ynov Lyon">
    <meta name="description" content="Retrouvez toutes les infos de la YPARTY du BDE/BDS Ynov Campus Lyon">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title') | YPARTY BDE/BDS Ynov Lyon">
    <meta property="og:description" content="Retrouvez toutes les infos de la YPARTY du BDE/BDS Ynov Campus Lyon">
    <meta property="og:image" content="{{ asset("assets/img/logobds.svg") }}">
    <meta property="og:site_name" content="{{ env("APP_NAME") }}">

    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="language" content="French">
    <meta name="author" content="MazBaz">
    <meta name="theme-color" content="#6a66ab">

    <link rel="icon" href="{{ asset("assets/img/logobds.svg") }}" />
    
    <title>@yield('title') | BDS Ynov Lyon</title>

    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @stack('scripts')
    @stack('styles')
</head>


<body>
    <header>
        @include('layouts.elements.navbar')
    </header>
    <div class="container pb-5">
        @include("layouts.elements.alerts")

        @yield('content')
    </div>
  
  @include('layouts.elements.disconnect')
  
</body>
<footer class="text-center py-4" style="color: #8f8ec0;">Made with ❤️ by MazBaz</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stack('footer-scripts')
</html>