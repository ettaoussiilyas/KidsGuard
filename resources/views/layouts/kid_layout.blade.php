<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Kid Space') - {{ config('app.name', 'KidsGuard') }}</title>
    
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
    
    <!-- Kids navigation icons -->
    <div class="bg-white pt-2 pb-3 px-4 shadow-md">
        <div class="max-w-7xl mx-auto">
            <!-- Category -->
            <div class="flex justify-center mb-2">
                <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
                    <a href=" route('kid.videos') " class="flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full bg-[#FF6B6B] flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold mt-1 text-center">Videos</span>
                    </a>
                    
                    <!-- Other navigation items with fixed routes -->
                    <a href=" " class="flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full bg-[#4A90E2] flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold mt-1 text-center">Games</span>
                    </a>
                    
                    <a href=" route('kid.learn') " class="flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full bg-[#FFD600] flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold mt-1 text-center">Learn</span>
                    </a>
                    
                    <a href=" " class="flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full bg-[#48C9B0] flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold mt-1 text-center">Stories</span>
                    </a>
                    
                    <a href=" " class="flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full bg-[#9B59B6] flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold mt-1 text-center">Music</span>
                    </a>
                    
                    <a href="  " class="flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full bg-[#E74C3C] flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold mt-1 text-center">Favorites</span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
    
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
                            <p>{{ session('success') }}</p>
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