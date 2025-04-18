<header class="fixed top-0 left-0 right-0 bg-white shadow-md z-10 ml-16 sm:ml-20 md:ml-64">
    <div class="flex items-center justify-between px-3 sm:px-6 py-3 sm:py-4">
        <!-- Left side: Page title and breadcrumbs -->
        
        <!-- Toggle Switch -->
        <div class="flex flex-col items-center">
            <form action="{{ route('switch-to-kid') }}" method="POST" class="inline">
                @csrf
                <button type="submit" id="mode-toggle" class="relative inline-flex items-center px-3 sm:px-5 py-1.5 sm:py-2 rounded-full bg-gradient-to-r from-[#9B59B6] to-[#4A90E2] text-white font-medium shadow-md hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none">
                    <span class="mr-1 sm:mr-2 text-sm sm:text-base">Kid Mode</span>
                    <div class="w-8 sm:w-10 h-5 sm:h-6 bg-white/90 rounded-full p-1 flex items-center">
                        <div class="toggle-circle w-3 sm:w-4 h-3 sm:h-4 bg-[#FFD600] rounded-full shadow-md transform transition-transform duration-300"></div>
                    </div>
                </button>
            </form>
            <span class="hidden sm:inline-block text-xs mt-1 text-gray-600">
                <svg class="w-4 h-4 inline-block text-[#9B59B6]" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
                Currently in Parent Mode
            </span>
        </div>
        
        <!-- Right side: User profile -->
        <div class="flex items-center">
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    @if(Auth::user()->avatar)
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                    @else
                        <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    @endif
                    <span class="hidden md:block text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                </button>
                
                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">
                    <div class="py-1">
                        <a href="{{ route('parent.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Colorful divider -->
    <div class="h-1 bg-gradient-to-r from-[#9B59B6] via-[#4A90E2] to-[#FFD600]"></div>
</header>
