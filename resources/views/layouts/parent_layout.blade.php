<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Parent Dashboard') - {{ config('app.name', 'KidsGuard') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Baloo+2:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('styles')
</head>
<body class="font-['Quicksand'] bg-gray-50 min-h-screen flex flex-col">
    <!-- Include the sidebar -->
    @include('partials.sidebar.parent_sidebar')
    
    <!-- Include the header -->
    @include('partials.headers.parent_header')
    
    <!-- Main content -->
    <main class="pt-24 pb-8 px-4 md:px-8 ml-20 md:ml-64 flex-grow">
        <div class="max-w-7xl mx-auto">
            <!-- Page content -->
            @yield('content')
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-white py-4 px-6 ml-20 md:ml-64 border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="text-sm text-gray-500 text-center md:text-left">
                &copy; {{ date('Y') }} KidsGuard. All rights reserved.
            </div>
            <div class="hidden md:flex items-center space-x-4 mt-3 md:mt-0">
                <a href="#" class="text-sm text-gray-500 hover:text-[#4A90E2] transition-colors">Privacy Policy</a>
                <a href="#" class="text-sm text-gray-500 hover:text-[#4A90E2] transition-colors">Terms of Service</a>
                <a href="#" class="text-sm text-gray-500 hover:text-[#4A90E2] transition-colors">Help Center</a>
            </div>
        </div>
    </footer>
    
    @stack('scripts')
</body>
</html>