<header class="bg-[#4A90E2] relative overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-[100px]">
            <!-- Logo -->
            <div class="relative">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="KidsGuard Logo" class="h-[50px] w-auto">
                </a>
            </div>
            
            @guest
                <!-- Buttons -->
                <div class="hidden md:flex space-x-4">
                    <!-- Login Button -->
                    <a href="{{ route('login.show') }}" class="bg-[#FFD600] text-[#4A90E2] px-6 py-2 rounded-xl font-medium shadow-md flex items-center justify-center hover:bg-opacity-90 transition duration-200">
                        <span class="font-['Open_Sans'] font-semibold">Login</span>
                    </a>

                    <!-- Register Button -->
                    <a href="{{ route('register.show') }}" class="bg-[#FFD600] text-[#4A90E2] px-6 py-2 rounded-xl font-medium shadow-md flex items-center justify-center hover:bg-opacity-90 transition duration-200">
                        <span class="font-['Open_Sans'] font-semibold">Register</span>
                    </a>
                </div>

            @endguest

            @auth
                <!-- Login Button -->
                <div class="flex flex-col space-y-3 pt-2">
                    <a href="{{ route('dashbourd') }}" class="bg-[#FFD600] text-[#4A90E2] px-6 py-2 rounded-xl font-medium shadow-md flex items-center justify-center hover:bg-opacity-90 transition duration-200 w-full">
                        <span class="font-['Open_Sans'] font-semibold">Dashboard</span>
                    </a>
                </div>
            @endauth

            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile menu (hidden by default) -->
        <div id="mobile-menu" class="md:hidden hidden pb-4">
            <nav class="flex flex-col space-y-4 mt-2">
                @guest
                    <div class="flex flex-col space-y-3 pt-2">
                        <a href="{{ route('login.show') }}" class="bg-[#FFD600] text-[#4A90E2] px-6 py-2 rounded-xl font-medium shadow-md flex items-center justify-center hover:bg-opacity-90 transition duration-200 w-full">
                            <span class="font-['Open_Sans'] font-semibold">Login</span>
                        </a>
                        <a href="{{ route('register.show') }}" class="bg-[#FFD600] text-[#4A90E2] px-6 py-2 rounded-xl font-medium shadow-md flex items-center justify-center hover:bg-opacity-90 transition duration-200 w-full">
                            <span class="font-['Open_Sans'] font-semibold">Register</span>
                        </a>
                    </div>
                @endguest
                @auth
                    <div class="flex flex-col space-y-3 pt-2">
                        <a href="{{ route('dashbourd') }}" class="bg-[#FFD600] text-[#4A90E2] px-6 py-2 rounded-xl font-medium shadow-md flex items-center justify-center hover:bg-opacity-90 transition duration-200 w-full">
                            <span class="font-['Open_Sans'] font-semibold">Dashboard</span>
                        </a>
                    </div>
                @endauth
            </nav>
        </div>
    </div>
</header>

<script>
    // Toggle mobile menu
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>