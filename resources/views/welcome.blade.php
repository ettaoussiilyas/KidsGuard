<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KidsGuard - Safe Digital Environment for Children</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/MiniLogo.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/MiniLogo.png') }}" type="image/png">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Open+Sans:wght@400;500;600;700&family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-white">
    <!-- header -->
    @include('partials.headers.homeHeader')
    
    
    <!-- main -->
    <main>
        @include('guest.home')
    </main>
    
    <!-- footer -->
    @include('partials.footers.homeFooter')
    
    <!-- script -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>