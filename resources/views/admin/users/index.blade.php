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
                <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Add New User
                </a>
            </div>
            <ul class="divide-y divide-gray-200">
                @foreach($users as $user)
                <li>
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center mb-2 sm:mb-0">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white overflow-hidden">
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                    @else
                                        {{ substr($user->name, 0, 1) }}
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                    <div class="text-xs text-gray-400 mt-1">
                                        Role: 
                                        @if($user->roles->isNotEmpty())
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                                {{ $user->roles->first()->name }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1">
                                                No Role
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button onclick="openEditModal({{ $user->id }})" class="text-blue-600 hover:text-blue-900">Edit</button>
                                @if(!$user->hasRole('admin') || $users->where('roles.slug', 'admin')->count() > 1)
                                    <button onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')" class="text-red-600 hover:text-red-900">Delete</button>
                                @else
                                    <span class="text-gray-400 cursor-not-allowed" title="Cannot delete the only admin">Delete</span>
                                @endif
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

<!-- Edit User Modal -->
<div id="editUserModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Edit User
                    </h3>
                    <div class="mt-4">
                        <form id="editUserForm" method="POST" action="">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="edit_name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="edit_email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="roles" class="block text-sm font-medium text-gray-700">Role</label>
                                <div class="mt-2 space-y-2" id="roles_container">
                                    @foreach($roles as $role)
                                    <div class="flex items-center">
                                        <input type="radio" name="role_id" value="{{ $role->id }}" id="role_{{ $role->id }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="role_{{ $role->id }}" class="ml-2 block text-sm text-gray-900">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" onclick="submitEditForm()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                Save
            </button>
            <button type="button" onclick="closeEditModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Delete User
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500" id="delete-message">
                            Are you sure you want to delete this user? This action cannot be undone.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <form id="deleteUserForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Delete
                </button>
            </form>
            <button type="button" onclick="closeDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </div>
</div>

<script>
    function openEditModal(userId) {
        // Fetch user data
        fetch(`/admin/users/${userId}/edit`)
            .then(response => response.json())
            .then(data => {
                // Populate form
                document.getElementById('edit_name').value = data.user.name;
                document.getElementById('edit_email').value = data.user.email;
                
                // Reset radio buttons
                const radioButtons = document.querySelectorAll('input[name="role_id"]');
                radioButtons.forEach(radio => {
                    radio.checked = false;
                });
                
                // Check user's role (assuming the first role is the one we want)
                if (data.user.roles && data.user.roles.length > 0) {
                    const roleId = data.user.roles[0].id;
                    const radioButton = document.getElementById(`role_${roleId}`);
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                }
                
                // Set form action
                document.getElementById('editUserForm').action = `/admin/users/${userId}`;
                
                // Show modal
                document.getElementById('editUserModal').classList.remove('hidden');
            });
    }
    
    function closeEditModal() {
        document.getElementById('editUserModal').classList.add('hidden');
    }
    
    function submitEditForm() {
        document.getElementById('editUserForm').submit();
    }
    
    function confirmDelete(userId, userName) {
        document.getElementById('delete-message').textContent = `Are you sure you want to delete ${userName}? This action cannot be undone.`;
        document.getElementById('deleteUserForm').action = `/admin/users/${userId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection