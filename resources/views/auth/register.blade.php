@extends('layouts.auth')

@section('content')
<div>
    <div class="text-center mb-6">
        <div class="relative inline-block">
            <img src="https://picsum.photos/600/300" alt="Join Us" class="rounded-xl mx-auto mb-4 shadow-md hover:shadow-lg transition-all duration-300">
            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 bg-white px-4 py-1 rounded-full shadow-md">
                <span class="text-[#4A90E2] font-bold">Welcome to KidsGuard!</span>
            </div>
        </div>
        <h2 class="text-3xl font-['Quicksand'] font-bold mb-2 text-center text-[#4A90E2] mt-6">Create Your Account</h2>
        <p class="text-gray-600">Join us to protect what matters most - your children</p>
    </div>
    
    <form method="POST" action="{{ route('register') }}" class="mt-8">
        @csrf

        <div class="mb-5 group">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 flex items-center">
                <svg class="h-4 w-4 text-[#FFD600] mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                Full Name
            </label>
            <div class="relative">
                <input id="name" type="text" class="pl-10 w-full rounded-xl border-2 border-gray-300 py-3 px-4 text-gray-700 focus:outline-none focus:border-[#4A90E2] focus:ring-2 focus:ring-[#4A90E2]/20 transition duration-200 @error('name') border-[#FF6B6B] @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="John Doe">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            @error('name')
                <p class="text-[#FF6B6B] text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5 group">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 flex items-center">
                <svg class="h-4 w-4 text-[#9B59B6] mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                Email Address
            </label>
            <div class="relative">
                <input id="email" type="email" class="pl-10 w-full rounded-xl border-2 border-gray-300 py-3 px-4 text-gray-700 focus:outline-none focus:border-[#4A90E2] focus:ring-2 focus:ring-[#4A90E2]/20 transition duration-200 @error('email') border-[#FF6B6B] @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="your-email@example.com">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                </div>
            </div>
            @error('email')
                <p class="text-[#FF6B6B] text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5 group">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 flex items-center">
                <svg class="h-4 w-4 text-[#48C9B0] mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
                Password
            </label>
            <div class="relative">
                <input id="password" type="password" class="pl-10 w-full rounded-xl border-2 border-gray-300 py-3 px-4 text-gray-700 focus:outline-none focus:border-[#4A90E2] focus:ring-2 focus:ring-[#4A90E2]/20 transition duration-200 @error('password') border-[#FF6B6B] @enderror" name="password" autocomplete="new-password" placeholder="••••••••">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            @error('password')
                <p class="text-[#FF6B6B] text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 group">
            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 flex items-center">
                <svg class="h-4 w-4 text-[#2ECC71] mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Confirm Password
            </label>
            <div class="relative">
                <input id="password-confirm" type="password" class="pl-10 w-full rounded-xl border-2 border-gray-300 py-3 px-4 text-gray-700 focus:outline-none focus:border-[#4A90E2] focus:ring-2 focus:ring-[#4A90E2]/20 transition duration-200" name="password_confirmation" autocomplete="new-password" placeholder="••••••••">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center space-y-4">
            <button type="submit" class="w-full bg-gradient-to-r from-[#4A90E2] to-[#3A80D2] text-white font-bold py-3.5 px-8 rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:-translate-y-1 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-[#4A90E2]/50 group">
                <span class="flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Create Account</span>
                </span>
            </button>
            
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-[#4A90E2] hover:text-[#3A80D2] transition duration-200">Login</a>
                </p>
            </div>
        </div>
    </form>
</div>
@endsection