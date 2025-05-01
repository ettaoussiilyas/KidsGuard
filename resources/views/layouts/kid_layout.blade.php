<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Kid Space') -   config('app.name', 'KidsGuard') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/MiniLogo.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/MiniLogo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Baloo+2:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('styles')
</head>
<body class="font-['Baloo_2'] bg-[#9B59B6] min-h-screen">

    @include('partials.messages.flash-messages')
    
    @include('partials.headers.kid_header')
    
    @include('partials.navigations.kid_navigateur')
    
    <!-- Main content -->
    <main class="pt-6 pb-8 px-4 md:px-8 bg-[#9B59B6]">
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
                            <p>  session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Page content -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                @yield('content')
            </div>
        </div>
    </main>
    
    <!-- 
    <footer class="bg-white py-3 px-6 border-t border-gray-200">
        <div class="max-w-7xl mx-auto flex justify-center">
            <div class="text-sm text-center">
                <div class="flex items-center justify-center space-x-2 text-[#9B59B6]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>KidsGuard - Safe Space for Kids</span>
                </div>
            </div>
        </div>
    </footer> -->
    
    @stack('scripts')
</body>
</html>