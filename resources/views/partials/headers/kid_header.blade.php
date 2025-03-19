<header class="fixed top-0 left-0 right-0 bg-white shadow-md z-10">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Left side: Page title and breadcrumbs -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="KidsGuard Logo" class="h-10 w-auto ml-10">
        </div>
        
        <!-- Middle: Toggle Switch for Parent Mode -->
        <div class="flex flex-col items-center">
            <button type="button" id="parent-mode-toggle" class="relative inline-flex items-center px-5 py-2.5 rounded-full bg-white border-2 border-[#9B59B6] text-gray-700 font-medium shadow-md hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none">
                <span class="mr-3 text-base font-semibold">Parent Mode</span>
                <div class="w-14 h-7 bg-gray-100 rounded-full p-1 flex items-center">
                    <div class="toggle-circle w-5 h-5 bg-[#9B59B6] rounded-full shadow-md transform transition-transform duration-300"></div>
                </div>
            </button>
            <span class="text-xs mt-1.5 text-gray-600 flex items-center">
                <svg class="w-4 h-4 inline-block text-[#FF6B6B] mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
                Requires parent password
            </span>
        </div>
        
        <!-- Right side: Kid Profile Selector -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-[#FFD600] to-[#FF6B6B] flex items-center justify-center text-white font-bold">
                    {{ substr(session('current_kid_name', 'Kid'), 0, 1) }}
                </div>
                <div class="hidden md:block text-left">
                    <div class="text-sm font-semibold text-gray-800">{{ session('current_kid_name', 'Kid Profile') }}</div>
                    <div class="text-xs text-gray-500">Kid Account</div>
                </div>
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            
            <!-- Kid Profile Dropdown menu -->
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                <!-- Loop through available kid profiles -->
                @foreach(Auth::user()->kidProfiles ?? [] as $kidProfile)
                    <a href=" route('kid.switch-profile', $kidProfile->id) " class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                        <div class="flex items-center {{ session('current_kid_id') == $kidProfile->id ? 'text-[#9B59B6] font-medium' : '' }}">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-r from-[#FFD600] to-[#FF6B6B] flex items-center justify-center text-white text-xs font-bold mr-2">
                                {{ substr($kidProfile->name, 0, 1) }}
                            </div>
                            {{ $kidProfile->name }}
                        </div>
                    </a>
                @endforeach
                
                <!-- <div class="border-t border-gray-200 my-1"></div> -->
                <a href=" " class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                    <div class="flex items-center text-[#4A90E2]">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Back to Kid Space
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Colorful divider -->
    <div class="h-1 bg-gradient-to-r from-[#FFD600] via-[#FF6B6B] to-[#9B59B6]"></div>
</header>

<!-- Parent Authentication Modal (Hidden by default) -->
<div id="parent-auth-modal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl p-6 w-full max-w-md mx-4 shadow-2xl transform transition-all">
        <div class="text-center mb-6">
            <h3 class="text-xl font-bold text-[#9B59B6]">Parent Authentication</h3>
            <p class="text-gray-600 mt-2">Please enter your security password to switch to Parent Mode</p>
        </div>
        
        <form id="parent-auth-form" action="{{ route('switch-to-guardian') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="parent-password" class="block text-sm font-medium text-[#9B59B6] mb-2">Security Password</label>
                <div class="relative">
                    <input type="password" id="parent-password" name="parent_password" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#9B59B6] focus:border-[#9B59B6] transition-colors pl-10">
                    <svg class="w-5 h-5 text-[#9B59B6] absolute left-3 top-1/2 transform -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            
            <div class="flex space-x-4 pt-2">
                <button type="button" id="cancel-auth" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium border border-gray-200">
                    Cancel
                </button>
                <button type="submit" id="verify-auth" class="flex-1 px-4 py-3 bg-[#9B59B6] hover:bg-[#8E44AD] text-white rounded-lg transition-colors font-medium shadow-md">                    
                    Verify
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Parent mode toggle functionality
        const parentModeToggle = document.getElementById('parent-mode-toggle');
        const parentAuthModal = document.getElementById('parent-auth-modal');
        const cancelAuth = document.getElementById('cancel-auth');
        const parentAuthForm = document.getElementById('parent-auth-form');
        
        // Show authentication modal when trying to switch to parent mode
        parentModeToggle.addEventListener('click', function() {
            parentAuthModal.classList.remove('hidden');
        });
        
        // Cancel authentication
        cancelAuth.addEventListener('click', function() {
            parentAuthModal.classList.add('hidden');
            document.getElementById('parent-password').value = '';
        });
        
        // Handle form submission
        parentAuthForm.addEventListener('submit', function(e) {
            // Form will submit normally, but we could add validation here if needed
        });
    });
</script>