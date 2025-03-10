@extends('layouts.auth')

@section('content')
<div class="relative">
    <!-- Decorative elements -->
    <div class="absolute -top-16 -left-16 w-32 h-32 bg-[#FFD600] rounded-full opacity-20 blur-xl"></div>
    <div class="absolute top-1/4 -right-20 w-40 h-40 bg-[#9B59B6] rounded-full opacity-20 blur-xl"></div>
    <div class="absolute -bottom-10 left-1/3 w-24 h-24 bg-[#48C9B0] rounded-full opacity-20 blur-xl"></div>
    
    <div class="relative z-10">
        <div class="text-center mb-8">
            <div class="relative inline-block mb-6">
                <img src="https://picsum.photos/600/300" alt="Welcome" class="rounded-2xl mx-auto shadow-lg transform transition-all duration-300 hover:scale-[1.02] hover:shadow-xl">
                <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-white px-6 py-2 rounded-full shadow-md">
                    <span class="text-[#4A90E2] font-bold">KidsGuard</span>
                </div>
            </div>
            <h2 class="text-3xl font-bold mb-3 text-center text-[#4A90E2]">Welcome Back!</h2>
            <p class="text-gray-600 max-w-sm mx-auto">Sign in to your account to monitor and protect your child's online activities</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}" class="mt-8">
            @csrf

            <div class="mb-5 transform transition-all duration-300 hover:translate-y-[-2px]">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#4A90E2] group-hover:text-[#3A80D2] transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <input id="email" type="email" class="pl-10 w-full rounded-xl border-2 border-gray-300 py-3 px-4 text-gray-700 focus:outline-none focus:border-[#4A90E2] focus:ring-2 focus:ring-[#4A90E2]/20 transition duration-200 @error('email') border-[#FF6B6B] @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="your-email@example.com">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <div class="h-5 w-5 text-gray-300">
                            @error('email')
                                <svg class="text-[#FF6B6B]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            @enderror
                        </div>
                    </div>
                </div>
                @error('email')
                    <p class="text-[#FF6B6B] text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5 transform transition-all duration-300 hover:translate-y-[-2px]">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#4A90E2] group-hover:text-[#3A80D2] transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input id="password" type="password" class="pl-10 w-full rounded-xl border-2 border-gray-300 py-3 px-4 text-gray-700 focus:outline-none focus:border-[#4A90E2] focus:ring-2 focus:ring-[#4A90E2]/20 transition duration-200 @error('password') border-[#FF6B6B] @enderror" name="password" autocomplete="current-password" placeholder="••••••••">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <div class="h-5 w-5 text-gray-300">
                            @error('password')
                                <svg class="text-[#FF6B6B]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            @enderror
                        </div>
                    </div>
                </div>
                @error('password')
                    <p class="text-[#FF6B6B] text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 flex justify-between items-center">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="rounded text-[#4A90E2] border-gray-300 focus:ring-[#4A90E2]/50 transition duration-200" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Remember Me</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="text-sm text-[#4A90E2] hover:text-[#3A80D2] transition duration-200" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <div class="flex flex-col items-center justify-center space-y-6">
                <button type="submit" class="w-full bg-[#4A90E2] hover:bg-[#3A80D2] text-white font-bold py-5 px-6 my-4 rounded-full shadow-md hover:shadow-lg transform transition-all duration-300 hover:-translate-y-1 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-[#4A90E2]/50 text-lg !h-16">
                    Sign In
                </button>
                
                <div class="relative w-full text-center">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-3 bg-white text-sm text-gray-500">or continue with</span>
                    </div>
                </div>
                
                <div class="flex space-x-4">
                    <button type="button" class="flex items-center justify-center p-3 rounded-xl border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition duration-200">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                    </button>
                    <button type="button" class="flex items-center justify-center p-3 rounded-xl border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition duration-200">
                        <svg class="w-5 h-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </button>
                    <button type="button" class="flex items-center justify-center p-3 rounded-xl border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition duration-200">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16.365 1.43c0 1.14-.493 2.27-1.177 3.08-.744.9-1.99 1.57-2.987 1.57-.12 0-.23-.02-.3-.03-.01-.06-.04-.22-.04-.39 0-1.15.572-2.27 1.206-2.98.804-.94 2.142-1.64 3.248-1.68.03.13.05.28.05.43zm4.565 15.71c-.03.07-.463 1.58-1.518 3.12-.945 1.34-1.94 2.71-3.43 2.71-1.517 0-1.9-.88-3.63-.88-1.698 0-2.302.91-3.67.91-1.377 0-2.332-1.26-3.428-2.8-1.287-1.82-2.323-4.63-2.323-7.28 0-4.28 2.797-6.55 5.552-6.55 1.448 0 2.675.95 3.6.95.865 0 2.222-1.01 3.902-1.01.613 0 2.886.06 4.374 2.19-.13.09-2.383 1.37-2.383 4.19 0 3.26 2.854 4.42 2.955 4.45z"/>
                        </svg>
                    </button>
                </div>
                
                <div class="text-center">
                    <p class="text-sm text-gray-600">Don't have an account? 
                        <a href="{{ route('register') }}" class="font-bold text-[#4A90E2] hover:text-[#3A80D2] transition duration-200">Register</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection