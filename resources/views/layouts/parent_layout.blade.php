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
<body class="font-['Quicksand'] bg-gray-50 min-h-screen">
    <!-- Include the sidebar -->
    @include('partials.sidebar.parent_sidebar')
    
    <!-- Include the header -->
    @include('partials.headers.parent_header')
    
    <!-- Main content -->
    <main class="pt-24 pb-8 px-4 md:px-8 ml-20 md:ml-64">
        <div class="max-w-7xl mx-auto">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Page content -->
            @yield('content')
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-white py-4 px-6 ml-20 md:ml-64 border-t border-gray-200">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="text-sm text-gray-500 mb-2 md:mb-0">
                &copy; {{ date('Y') }} KidsGuard. All rights reserved.
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-sm text-gray-500 hover:text-[#4A90E2] transition-colors">Privacy Policy</a>
                <a href="#" class="text-sm text-gray-500 hover:text-[#4A90E2] transition-colors">Terms of Service</a>
                <a href="#" class="text-sm text-gray-500 hover:text-[#4A90E2] transition-colors">Help Center</a>
            </div>
        </div>
    </footer>
    
    @stack('scripts')
</body>
</html>