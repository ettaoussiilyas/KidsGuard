@extends('layouts.parent_layout')

@section('title', 'Newsletter Subscription')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Newsletter Subscription</h1>
            <p class="mt-2 text-sm text-gray-600">Manage your newsletter preferences to stay updated with KidsGuard.</p>
        </div>

        <!-- Newsletter Subscription Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg max-w-3xl mx-auto">
            <div class="px-4 py-5 sm:p-6">
                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                
                <form action="{{ route('newsletter.toggle') }}" method="POST">
                    @csrf
                    
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3 mr-4">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Weekly Newsletter</h2>
                            <p class="text-sm text-gray-600">Receive updates about new content, features, and tips.</p>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="subscribe" name="subscribe" class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500"
                                {{ $isSubscribed ? 'checked' : '' }}>
                            <label for="subscribe" class="ml-2 text-gray-700 font-medium">
                                Subscribe to our weekly newsletter
                            </label>
                        </div>
                        
                        <p class="mt-3 text-sm text-gray-600">
                            Our newsletter includes:
                        </p>
                        <ul class="mt-2 text-sm text-gray-600 list-disc list-inside space-y-1">
                            <li>New content updates for children</li>
                            <li>Tips for using KidsGuard effectively</li>
                            <li>Educational resources for parents</li>
                            <li>Special announcements and features</li>
                        </ul>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            Save Preferences
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Privacy Note -->
        <div class="mt-6 max-w-3xl mx-auto">
            <p class="text-xs text-gray-500 text-center">
                We respect your privacy. You can unsubscribe at any time by returning to this page and updating your preferences.
            </p>
        </div>
    </div>
</div>
@endsection