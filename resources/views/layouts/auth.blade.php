<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'KidsGuard') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Baloo+2:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        .floating-delay-1 {
            animation-delay: 0.5s;
        }
        .floating-delay-2 {
            animation-delay: 1s;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .wiggle {
            animation: wiggle 4s ease-in-out infinite;
        }
        @keyframes wiggle {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }
    </style>
</head>
<body class="font-['Quicksand'] bg-gradient-to-br from-blue-50 to-purple-50">
    <!-- Background decorative elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <!-- Clouds -->
        <div class="absolute top-10 left-[10%] w-24 h-12 bg-white rounded-full opacity-60 floating"></div>
        <div class="absolute top-20 left-[20%] w-32 h-16 bg-white rounded-full opacity-70 floating floating-delay-1"></div>
        <div class="absolute top-16 right-[15%] w-28 h-14 bg-white rounded-full opacity-65 floating floating-delay-2"></div>
        
        <!-- Stars -->
        <div class="absolute top-[15%] right-[25%] w-4 h-4 bg-[#FFD600] rounded-full opacity-40 animate-pulse"></div>
        <div class="absolute top-[35%] left-[18%] w-3 h-3 bg-[#FFD600] rounded-full opacity-30 animate-pulse"></div>
        <div class="absolute bottom-[20%] right-[30%] w-5 h-5 bg-[#FFD600] rounded-full opacity-50 animate-pulse"></div>
        
        <!-- Colorful circles -->
        <div class="absolute top-[40%] left-[5%] w-40 h-40 bg-[#4A90E2] rounded-full opacity-10"></div>
        <div class="absolute bottom-[10%] right-[5%] w-32 h-32 bg-[#9B59B6] rounded-full opacity-10"></div>
        <div class="absolute top-[10%] right-[8%] w-24 h-24 bg-[#FFD600] rounded-full opacity-10"></div>
        
        <!-- Patterns -->
        <svg class="absolute bottom-0 left-0 w-full h-32 text-white opacity-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="currentColor" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,202.7C672,203,768,181,864,181.3C960,181,1056,203,1152,208C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
   
    <div class="min-h-screen flex flex-col justify-center relative z-10">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto">
                <!-- Logo section with kid-friendly design -->
                <div class="text-center mb-8 relative">
                    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-20 h-20 bg-[#4A90E2] rounded-full opacity-20 animate-pulse"></div>
                    <div class="relative inline-block">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#4A90E2]/30 to-[#9B59B6]/30 rounded-xl blur-md transform rotate-3"></div>
                        <div class="relative z-10 py-2">
                            <div class="flex justify-center items-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/2302/2302834.png" alt="KidsGuard Shield" class="h-16 mr-3 wiggle">
                                <h1 class="font-['Baloo_2'] text-3xl font-bold text-[#4A90E2]">KidsGuard</h1>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">Protecting little explorers online</p>
                        </div>
                    </div>
                    <div class="w-24 h-1.5 bg-gradient-to-r from-[#4A90E2] via-[#9B59B6] mt-2"></div>
                </div>
                
                <!-- Card with kid-friendly design -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 mb-8 relative overflow-hidden backdrop-blur-sm bg-white/95 border border-white/20">
                    <!-- Decorative elements -->
                    <div class="absolute -top-10 -right-10 w-20 h-20 bg-[#FFD600] opacity-10 rounded-full"></div>
                    <div class="absolute -bottom-8 -left-8 w-16 h-16 bg-[#4A90E2] opacity-10 rounded-full"></div>
                    
                    <!-- Decorative corner patterns -->
                    <div class="absolute top-0 left-0 w-16 h-16 pointer-events-none">
                        <img src="https://cdn-icons-png.flaticon.com/512/3813/3813748.png" alt="Star" class="absolute top-4 left-4 w-6 h-6 opacity-20">
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-16 h-16 pointer-events-none">
                        <img src="https://cdn-icons-png.flaticon.com/512/3813/3813748.png" alt="Star" class="absolute bottom-4 right-4 w-6 h-6 opacity-20">
                    </div>
                    
                    <!-- Playful decorative elements -->
                    <div class="absolute top-1/2 left-0 transform -translate-y-1/2">
                        <img src="https://cdn-icons-png.flaticon.com/512/3069/3069172.png" alt="Rocket" class="w-8 h-8 opacity-10 floating">
                    </div>
                    
                    <div class="absolute top-1/4 right-0 transform -translate-y-1/2">
                        <img src="https://cdn-icons-png.flaticon.com/512/3069/3069186.png" alt="Planet" class="w-10 h-10 opacity-10 floating floating-delay-1">
                    </div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        @yield('content')
                    </div>
                </div>
                
                <!-- Footer with kid-friendly design -->
                <div class="text-center text-gray-500 text-sm">
                    <div class="flex items-center justify-center mb-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/1998/1998342.png" alt="Shield" class="w-6 h-6 mx-2 opacity-70">
                    </div>
                    <p>&copy; {{ date('Y') }} KidsGuard. All rights reserved.</p>
                    <p class="mt-2 flex items-center justify-center">
                        <span class="inline-block mr-2">Keeping children safe online</span>
                        <span class="inline-flex items-center justify-center w-4 h-4 bg-[#4A90E2]/10 rounded-full">
                            <span class="w-2 h-2 bg-[#4A90E2] rounded-full"></span>
                        </span>
                    </p>
                    
                    <!-- Kid-friendly footer icons -->
                    <div class="flex justify-center space-x-4 mt-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2302/2302867.png" alt="Child" class="w-6 h-6 opacity-50 hover:opacity-100 transition-opacity">
                        <img src="https://cdn-icons-png.flaticon.com/512/2302/2302994.png" alt="Family" class="w-6 h-6 opacity-50 hover:opacity-100 transition-opacity">
                        <img src="https://cdn-icons-png.flaticon.com/512/2302/2302841.png" alt="Protection" class="w-6 h-6 opacity-50 hover:opacity-100 transition-opacity">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>