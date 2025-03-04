<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KidsGuard - Safe Digital Environment for Children</title>
    
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
    <x-header />
    
    <!-- main -->
    <main>
        
    </main>
    
    <!-- footer -->
    <x-footer />
    
    <!-- script -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>