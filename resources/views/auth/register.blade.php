@extends('layouts.auth')

@section('content')
<div>
    <div class="text-center mb-6">
        <div class="relative inline-block">
            <img src="{{asset('images/sections/register.jpg')}}" alt="Join Us" class="rounded-xl mx-auto mb-4 shadow-md hover:shadow-lg transition-all duration-300">
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

        <div class="relative w-full text-center my-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-3 bg-white text-sm text-gray-500">or sign up with</span>
            </div>
        </div>

        <div class="flex space-x-4 w-full mb-8">
            <a href="{{ route('social.login', 'google') }}" class="flex-1 flex items-center justify-center p-3 rounded-xl border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition duration-200 group">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
            </a>
            <!-- <a href="{{ route('social.login', 'facebook') }}" class="flex-1 flex items-center justify-center p-3 rounded-xl border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition duration-200 group">
                <svg class="w-5 h-5 text-[#1877F2] group-hover:scale-110 transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </a>
            <a href="{{ route('social.login', 'apple') }}" class="flex-1 flex items-center justify-center p-3 rounded-xl border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition duration-200 group">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16.365 1.43c0 1.14-.493 2.27-1.177 3.08-.744.9-1.99 1.57-2.987 1.57-.12 0-.23-.02-.3-.03-.01-.06-.04-.22-.04-.39 0-1.15.572-2.27 1.206-2.98.804-.94 2.142-1.64 3.248-1.68.03.13.05.28.05.43zm4.565 15.71c-.03.07-.463 1.58-1.518 3.12-.945 1.34-1.94 2.71-3.43 2.71-1.517 0-1.9-.88-3.63-.88-1.698 0-2.302.91-3.67.91-1.377 0-2.332-1.26-3.428-2.8-1.287-1.82-2.323-4.63-2.323-7.28 0-4.28 2.797-6.55 5.552-6.55 1.448 0 2.675.95 3.6.95.865 0 2.222-1.01 3.902-1.01.613 0 2.886.06 4.374 2.19-.13.09-2.383 1.37-2.383 4.19 0 3.26 2.854 4.42 2.955 4.45z"/>
                </svg>
            </a> -->
        </div>

        <div class="flex-col items-center justify-center space-y-4">
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