<header class="fixed top-0 left-0 right-0 bg-white shadow-md z-10 ml-20 md:ml-64">
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
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                </svg>
                One-click access to Kid's space
            </span>
        </div>
        
        <!-- Right side: Notifications and profile -->
        <div class="flex items-center space-x-2 sm:space-x-4">
            <!-- Notifications -->
            <div class="relative">
                <button class="p-1.5 sm:p-2 rounded-full hover:bg-gray-100 transition-colors relative">
                    <svg class="w-5 sm:w-6 h-5 sm:h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="absolute top-0 right-0 w-3.5 sm:w-4 h-3.5 sm:h-4 bg-[#FF6B6B] rounded-full text-xs text-white flex items-center justify-center">3</span>
                </button>
            </div>
            
            <!-- Profile dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 sm:space-x-3 focus:outline-none">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gradient-to-r from-[#4A90E2] to-[#9B59B6] flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="hidden md:block text-left">
                        <div class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500">Parent Account</div>
                    </div>
                    <svg class="w-4 h-4 text-gray-500 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 sm:w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#4A90E2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            My Profile
                        </div>
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#9B59B6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Account Settings
                        </div>
                    </a>
                    <div class="border-t border-gray-200 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            <div class="flex items-center text-[#FF6B6B]">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Colorful divider -->
    <div class="h-1 bg-gradient-to-r from-[#4A90E2] via-[#9B59B6] to-[#FFD600]"></div>
</header>
