<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'KidsGuard') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Open_Sans'] bg-gradient-to-br from-gray-50 to-gray-100 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%22100%22%20height%3D%22100%22%20viewBox%3D%220%200%20100%20100%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M11%2018c3.866%200%207-3.134%207-7s-3.134-7-7-7-7%203.134-7%207%203.134%207%207%207zm48%2025c3.866%200%207-3.134%207-7s-3.134-7-7-7-7%203.134-7%207%203.134%207%207%207zm-43-7c1.657%200%203-1.343%203-3s-1.343-3-3-3-3%201.343-3%203%201.343%203%203%203zm63%2031c1.657%200%203-1.343%203-3s-1.343-3-3-3-3%201.343-3%203%201.343%203%203%203zM34%2090c1.657%200%203-1.343%203-3s-1.343-3-3-3-3%201.343-3%203%201.343%203%203%203zm56-76c1.657%200%203-1.343%203-3s-1.343-3-3-3-3%201.343-3%203%201.343%203%203%203zM12%2086c2.21%200%204-1.79%204-4s-1.79-4-4-4-4%201.79-4%204%201.79%204%204%204zm28-65c2.21%200%204-1.79%204-4s-1.79-4-4-4-4%201.79-4%204%201.79%204%204%204zm23-11c2.76%200%205-2.24%205-5s-2.24-5-5-5-5%202.24-5%205%202.24%205%205%205zm-6%2060c2.21%200%204-1.79%204-4s-1.79-4-4-4-4%201.79-4%204%201.79%204%204%204zm29%2022c2.76%200%205-2.24%205-5s-2.24-5-5-5-5%202.24-5%205%202.24%205%205%205zM32%2063c2.76%200%205-2.24%205-5s-2.24-5-5-5-5%202.24-5%205%202.24%205%205%205zm57-13c2.76%200%205-2.24%205-5s-2.24-5-5-5-5%202.24-5%205%202.24%205%205%205zm-9-21c1.105%200%202-.895%202-2s-.895-2-2-2-2%20.895-2%202%20.895%202%202%202zM60%2091c1.105%200%202-.895%202-2s-.895-2-2-2-2%20.895-2%202%20.895%202%202%202zM35%2041c1.105%200%202-.895%202-2s-.895-2-2-2-2%20.895-2%202%20.895%202%202%202zM12%2060c1.105%200%202-.895%202-2s-.895-2-2-2-2%20.895-2%202%20.895%202%202%202z%22%20fill%3D%22%234a90e2%22%20fill-opacity%3D%220.05%22%20fill-rule%3D%22evenodd%22%2F%3E%3C%2Fsvg%3E')]">
   
    <div class="min-h-screen flex flex-col justify-center relative z-10">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto">
                <!-- Logo section with enhanced design -->
                <div class="text-center mb-8 relative">
                    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-20 h-20 bg-[#4A90E2] rounded-full opacity-10 animate-pulse"></div>
                    <div class="relative inline-block">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#4A90E2]/30 to-[#9B59B6]/30 rounded-xl blur-md transform rotate-3"></div>
                        <img src="https://picsum.photos/200/80" alt="KidsGuard Logo" class="max-w-[200px] mx-auto mb-4 relative z-10 drop-shadow-md">
                    </div>
                    <div class="w-24 h-1.5 bg-gradient-to-r from-[#4A90E2] via-[#9B59B6] to-[#48C9B0] mx-auto rounded-full mt-2"></div>
                </div>
                
                <!-- Card with enhanced design -->
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 mb-8 relative overflow-hidden backdrop-blur-sm bg-white/95 border border-white/20">
                    <!-- Decorative elements -->
                    <div class="absolute -top-10 -right-10 w-20 h-20 bg-[#FFD600] opacity-10 rounded-full"></div>
                    <div class="absolute -bottom-8 -left-8 w-16 h-16 bg-[#4A90E2] opacity-10 rounded-full"></div>
                    
                    <!-- Decorative corner patterns -->
                    <div class="absolute top-0 left-0 w-16 h-16 pointer-events-none">
                        <div class="absolute top-4 left-4 w-2 h-2 bg-[#4A90E2] rounded-full opacity-40"></div>
                        <div class="absolute top-4 left-8 w-1.5 h-1.5 bg-[#FFD600] rounded-full opacity-40"></div>
                        <div class="absolute top-8 left-4 w-1.5 h-1.5 bg-[#9B59B6] rounded-full opacity-40"></div>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-16 h-16 pointer-events-none">
                        <div class="absolute bottom-4 right-4 w-2 h-2 bg-[#4A90E2] rounded-full opacity-40"></div>
                        <div class="absolute bottom-4 right-8 w-1.5 h-1.5 bg-[#FFD600] rounded-full opacity-40"></div>
                        <div class="absolute bottom-8 right-4 w-1.5 h-1.5 bg-[#9B59B6] rounded-full opacity-40"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        @yield('content')
                    </div>
                </div>
                
                <!-- Footer with enhanced design -->
                <div class="text-center text-gray-500 text-sm">
                    <div class="flex items-center justify-center mb-3">
                        <span class="h-px w-12 bg-gradient-to-r from-transparent to-gray-300"></span>
                        <svg class="w-5 h-5 mx-2 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="h-px w-12 bg-gradient-to-l from-transparent to-gray-300"></span>
                    </div>
                    <p>&copy; {{ date('Y') }} KidsGuard. All rights reserved.</p>
                    <p class="mt-2 flex items-center justify-center">
                        <span class="inline-block mr-2">Keeping children safe online</span>
                        <span class="inline-flex items-center justify-center w-4 h-4 bg-[#4A90E2]/10 rounded-full">
                            <span class="w-2 h-2 bg-[#4A90E2] rounded-full"></span>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>