@extends('layouts.parent_layout')

@section('title', 'Account Settings')

@section('content')
<div class="max-w-7xl mx-auto mb-6 mt-6">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl">
        <h1 class="text-2xl md:text-3xl font-bold text-white">Account Settings</h1>
        <p class="text-indigo-100 mt-2">Manage your profile, security, and account preferences</p>
    </div>
</div>

<div class="max-w-4xl mx-auto space-y-6 pb-6">
    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-md">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-green-700">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Profile Information Section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
        <div class="bg-indigo-600 px-6 py-4">
            <h2 class="text-lg font-semibold text-white">Profile Information</h2>
        </div>
        <div class="p-6">
            <form id="profile-form" action="{{ route('parent.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <!-- Profile Picture -->
                    <div class="flex-shrink-0">
                        <div class="relative group">
                            <img id="profile-preview" src="{{ auth()->user()->avatar_url }}" 
                                 class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100 shadow-md">
                            <label for="avatar" class="absolute inset-0 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </label>
                            <input type="file" id="avatar" name="avatar" class="hidden" accept="image/*">
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="flex-1 space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea id="bio" name="bio" rows="3"
                                      class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">{{ old('bio', auth()->user()->bio) }}</textarea>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Password Update Section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
        <div class="bg-indigo-600 px-6 py-4">
            <h2 class="text-lg font-semibold text-white">Change Password</h2>
        </div>
        <div class="p-6">
            <form id="password-form" action="{{ route('parent.password.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4 mb-6">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                        <div class="relative">
                            <input type="password" id="current_password" name="current_password" 
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 pr-10">
                            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 toggle-password">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <div class="relative">
                            <input type="password" id="new_password" name="new_password" 
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 pr-10">
                            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 toggle-password">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        <div id="password-strength" class="h-1 mt-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full transition-all duration-500" style="width: 0%"></div>
                        </div>
                        <p id="password-strength-text" class="text-xs mt-1 text-gray-500"></p>
                        @error('new_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <div class="relative">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 pr-10">
                            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 toggle-password">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Account Section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
        <div class="bg-red-600 px-6 py-4">
            <h2 class="text-lg font-semibold text-white">Delete Account</h2>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <p class="text-gray-700">Once you delete your account, there is no going back. Please be certain.</p>
                <p class="text-gray-500 text-sm mt-2">All your data, including child profiles and preferences, will be permanently removed.</p>
            </div>
            <button id="delete-account-btn" class="px-6 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                Delete Account
            </button>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4 transition-opacity duration-300 opacity-0">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full p-6">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-lg font-bold text-gray-900">Confirm Account Deletion</h3>
            <button id="close-delete-modal" class="text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="mb-6">
            <p class="text-gray-700 mb-4">Are you sure you want to delete your account? This action cannot be undone.</p>
            <div class="space-y-3">
                <div>
                    <label for="delete_password" class="block text-sm font-medium text-gray-700 mb-1">Enter your password to confirm</label>
                    <input type="password" id="delete_password" name="delete_password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200">
                    @error('delete_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-3">
            <button id="cancel-delete" class="px-4 py-2 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                Cancel
            </button>
            <form id="delete-form" action="{{ route('parent.profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="delete_password_hidden" name="delete_password">
                <button type="submit" class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Delete Account
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile picture preview
        const avatarInput = document.getElementById('avatar');
        const profilePreview = document.getElementById('profile-preview');
        
        if (avatarInput && profilePreview) {
            avatarInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        profilePreview.src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                
                // Change icon
                const icon = this.querySelector('svg');
                if (type === 'password') {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
                } else {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
                }
            });
        });

        // Password strength meter
        const passwordInput = document.getElementById('new_password');
        const strengthMeter = document.querySelector('#password-strength > div');
        const strengthText = document.getElementById('password-strength-text');
        
        if (passwordInput && strengthMeter && strengthText) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Check length
                if (password.length >= 8) strength += 1;
                if (password.length >= 12) strength += 1;
                
                // Check complexity
                if (password.match(/[a-z]/)) strength += 1;
                if (password.match(/[A-Z]/)) strength += 1;
                if (password.match(/[0-9]/)) strength += 1;
                if (password.match(/[^a-zA-Z0-9]/)) strength += 1;
                
                // Update meter
                const width = Math.min(strength * 16.6, 100);
                strengthMeter.style.width = width + '%';
                
                // Update colors and text
                if (width < 40) {
                    strengthMeter.className = 'h-full transition-all duration-500 bg-red-500';
                    strengthText.textContent = 'Weak password';
                } else if (width < 70) {
                    strengthMeter.className = 'h-full transition-all duration-500 bg-yellow-500';
                    strengthText.textContent = 'Moderate password';
                } else if (width < 90) {
                    strengthMeter.className = 'h-full transition-all duration-500 bg-blue-500';
                    strengthText.textContent = 'Strong password';
                } else {
                    strengthMeter.className = 'h-full transition-all duration-500 bg-green-500';
                    strengthText.textContent = 'Very strong password';
                }
            });
        }

        // Delete account modal handling
        const deleteModal = document.getElementById('delete-modal');
        const deleteBtn = document.getElementById('delete-account-btn');
        const closeDeleteModal = document.getElementById('close-delete-modal');
        const cancelDelete = document.getElementById('cancel-delete');
        const deletePasswordInput = document.getElementById('delete_password');
        const deletePasswordHidden = document.getElementById('delete_password_hidden');
        const deleteForm = document.getElementById('delete-form');
        
        if (deleteBtn && deleteModal) {
            deleteBtn.addEventListener('click', function() {
                deleteModal.classList.remove('hidden');
                setTimeout(() => {
                    deleteModal.classList.add('opacity-100');
                    deleteModal.style.display = 'flex';
                }, 10);
                document.body.style.overflow = 'hidden';
            });
        }

        function closeDeleteAccountModal() {
            deleteModal.classList.remove('opacity-100');
            setTimeout(() => {
                deleteModal.classList.add('hidden');
                deleteModal.style.display = 'none';
                document.body.style.overflow = '';
                document.body.style.pointerEvents = 'auto';
            }, 300);
        }

        if (closeDeleteModal) {
            closeDeleteModal.addEventListener('click', closeDeleteAccountModal);
        }

        if (cancelDelete) {
            cancelDelete.addEventListener('click', closeDeleteAccountModal);
        }
        
        // Transfer password value to hidden input before form submission
        if (deleteForm && deletePasswordInput && deletePasswordHidden) {
            deleteForm.addEventListener('submit', function(e) {
                deletePasswordHidden.value = deletePasswordInput.value;
            });
        }

        // Form submission handling
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    `;
                }
            });
        });
    });
</script>
@endpush
@endsection