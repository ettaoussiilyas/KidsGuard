<div class="fixed left-0 top-0 h-full w-16 sm:w-20 md:w-64 bg-[#9B59B6] text-white flex flex-col justify-between transition-all duration-300 shadow-lg z-20">
    <!-- Logo and Brand -->
    <div class="p-2 sm:p-3 md:p-4 flex flex-col items-center">
        <a href="{{ route('parent.space') }}" class="flex items-center justify-center">
            <div class="w-10 h-10 sm:w-14 sm:h-14 md:w-auto md:h-auto overflow-hidden">
                <img src="{{ asset('images/logo.png') }}" alt="KidsGuard" class="w-full h-full object-contain">
            </div>
        </a>
        <div class="hidden md:block w-full h-1 bg-[#FFD600] rounded-none mt-2 mb-6"></div>
    </div>
    
    <!-- Navigation Menu -->
    <div class="flex-1 overflow-y-auto py-2 sm:py-4">
        <ul class="space-y-1 sm:space-y-2 px-1 sm:px-2">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('parent.space') }}" class="flex flex-col md:flex-row items-center justify-center md:justify-start p-2 sm:p-3 rounded-xl hover:bg-white/10 transition-colors duration-200 {{ request()->routeIs('parent.space') ? 'bg-white/20' : '' }}">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-[#4A90E2] rounded-full mb-1 md:mb-0 md:mr-3">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] sm:text-xs md:text-base font-medium">Dashboard</span>
                </a>
            </li>
            
            <!-- Kids Profiles -->
            <li>
                <a href="{{ route('parent.child-profiles.index') }}" class="flex flex-col md:flex-row items-center justify-center md:justify-start p-2 sm:p-3 rounded-xl hover:bg-white/10 transition-colors duration-200 {{ request()->routeIs('kids.profiles') ? 'bg-white/20' : '' }}">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-[#FFD600] rounded-full mb-1 md:mb-0 md:mr-3">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] sm:text-xs md:text-base font-medium">Kids</span>
                </a>
            </li>
            
            <!-- Preferences - Fix inconsistent padding -->
            <li>
                <a href="{{ route('parent.preferences.index') }}" class="flex flex-col md:flex-row items-center justify-center md:justify-start p-2 sm:p-3 rounded-xl hover:bg-white/10 transition-colors duration-200 {{ request()->routeIs('preferences') ? 'bg-white/20' : '' }}">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-[#48C9B0] rounded-full mb-1 md:mb-0 md:mr-3">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] sm:text-xs md:text-base font-medium">Preferences</span>
                </a>
            </li>
            
            <!-- Parent Games - Fix inconsistent padding -->
            <li>
                <a href="{{ route('parent.parent-games') }}" class="flex flex-col md:flex-row items-center justify-center md:justify-start p-2 sm:p-3 rounded-xl hover:bg-white/10 transition-colors duration-200 {{ request()->routeIs('parent.games') ? 'bg-white/20' : '' }}">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-[#E74C3C] rounded-full mb-1 md:mb-0 md:mr-3">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] sm:text-xs md:text-base font-medium">Parent Games</span>
                </a>
            </li>
            
            <!-- Settings - Fix inconsistent padding -->
            <li>
                <a href="{{ route('parent.settings') }}" class="flex flex-col md:flex-row items-center justify-center md:justify-start p-2 sm:p-3 rounded-xl hover:bg-white/10 transition-colors duration-200 {{ request()->routeIs('settings') ? 'bg-white/20' : '' }}">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-[#95A5A6] rounded-full mb-1 md:mb-0 md:mr-3">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] sm:text-xs md:text-base font-medium">Settings</span>
                </a>
            </li>
            
            <!-- Newsletter Subscription - Fix inconsistent padding -->
            <li>
                <a href="{{ route('newsletter.subscription') }}" class="flex flex-col md:flex-row items-center justify-center md:justify-start p-2 sm:p-3 rounded-xl hover:bg-white/10 transition-colors duration-200 {{ request()->routeIs('newsletter.*') ? 'bg-white/20' : '' }}">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-[#3498DB] rounded-full mb-1 md:mb-0 md:mr-3">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] sm:text-xs md:text-base font-medium">Newsletter</span>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Logout Button -->
    <div class="p-2 sm:p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex flex-col md:flex-row items-center justify-center md:justify-start p-2 sm:p-3 rounded-xl hover:bg-white/10 transition-colors duration-200 text-white">
                <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-[#FF6B6B] rounded-full mb-1 md:mb-0 md:mr-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <span class="text-[10px] sm:text-xs md:text-base font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>