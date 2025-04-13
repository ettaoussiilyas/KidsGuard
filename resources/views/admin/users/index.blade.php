@extends('layouts.admin_layout')

@section('title', 'User Management')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">User Management</h1>
            <p class="mt-2 text-sm text-gray-600">Manage all users of the KidsGuard platform.</p>
        </div>

        <!-- User List -->
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Users</h3>
                <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Add New User
                </a>
            </div>
            <ul class="divide-y divide-gray-200">
                @foreach($users as $user)
                <li>
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection