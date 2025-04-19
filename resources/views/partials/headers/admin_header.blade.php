<header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-20 ml-16 sm:ml-20 md:ml-64">
    <div class="flex items-center justify-between h-16 md:h-20 px-4 md:px-6">
        <!-- Left side: Page title -->
        <div>
            <h1 class="text-xl font-bold text-gray-800">@yield('header_title', 'Admin Dashboard')</h1>
        </div>
        
        <!-- Right side: User menu -->
        <div class="flex items-center space-x-4">
            <!-- Notifications -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="p-1 rounded-full text-gray-500 hover:text-gray-700 focus:outline-none">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                </button>
                
                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-80 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">
                    <div class="py-1">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                        </div>
                        <div class="max-h-60 overflow-y-auto">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 border-b border-gray-100">
                                <p class="font-medium">New user registered</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 border-b border-gray-100">
                                <p class="font-medium">System update completed</p>
                                <p class="text-xs text-gray-500">1 day ago</p>
                            </a>
                        </div>
                        <a href="#" class="block px-4 py-2 text-sm text-center text-blue-600 hover:bg-gray-100">View all notifications</a>
                    </div>
                </div>
            </div>
            
            <!-- User dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    @if(Auth::user()->avatar)
                        <img class="h-8 w-8 rounded-full object-cover border-2 border-gray-200" 
                             src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}" 
                             alt="{{ Auth::user()->name }}">
                    @else
                        <img class="h-8 w-8 rounded-full object-cover" 
                             src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=4A90E2&color=fff" 
                             alt="{{ Auth::user()->name }}">
                    @endif
                    <span class="hidden md:block text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                    <svg class="hidden md:block h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                        <a href="{{ route('admin.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- System Status Bar -->
    <div class="bg-gray-100 px-3 sm:px-6 py-1 flex items-center justify-between text-xs text-gray-600 border-t border-gray-200">
        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <div class="w-2 h-2 rounded-full bg-green-500 mr-1"></div>
                <span>System: Online</span>
            </div>
            <div class="flex items-center">
                <div class="w-2 h-2 rounded-full bg-green-500 mr-1"></div>
                <span>Database: Connected</span>
            </div>
            <div class="hidden sm:flex items-center">
                <div class="w-2 h-2 rounded-full bg-green-500 mr-1"></div>
                <span>Cache: Active</span>
            </div>
        </div>
        <div class="text-xs">
            <span>v1.0.0</span>
        </div>
    </div>
    
    <!-- Colorful divider -->
    <div class="h-1 bg-gradient-to-r from-[#3498DB] via-[#2ECC71] to-[#F1C40F]"></div>
</header>