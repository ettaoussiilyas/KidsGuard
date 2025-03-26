@extends('layouts.parent_layout')

@section('title', 'Child Content Preferences')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5 rounded-t-xl">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-white">Content Preferences</h1>
                <p class="text-indigo-100 text-sm mt-1">Customize learning content for your child</p>
            </div>
            
            @if(!$childProfiles->isEmpty())
            <div class="relative">
                <select id="child_profile" class="appearance-none bg-white text-gray-700 py-2 pl-4 pr-10 rounded-lg border-0 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium">
                    <option value="">Select a child</option>
                    @foreach($childProfiles as $profile)
                        <option value="{{ $profile->id }}" 
                            data-gender="{{ $profile->gender }}"
                            data-has-adhd="{{ $profile->has_adhd ? 'true' : 'false' }}"
                            data-has-autism="{{ $profile->has_autism ? 'true' : 'false' }}">
                            {{ $profile->name }} ({{ $profile->age }} years old)
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            @endif
        </div>
    </div>
    
    <div class="bg-white p-5 sm:p-8 rounded-b-xl">
        @if($childProfiles->isEmpty())
            <div class="text-center py-12 bg-gray-50 rounded-lg">
                <svg class="mx-auto h-16 w-16 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No child profiles</h3>
                <p class="mt-2 text-gray-500 max-w-md mx-auto">You need to create a child profile before setting content preferences.</p>
                <div class="mt-8">
                    <a href="{{ route('parent.child-profiles.create') }}" class="inline-flex items-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md transition-all duration-200">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Create Child Profile
                    </a>
                </div>
            </div>
        @else
            <form id="preferences-form" action="{{ route('parent.preferences.update', ['kid' => 0]) }}" method="POST">
                @csrf
                <div id="preferences-container" class="hidden">
                    <div class="pt-2">
                        <div id="loading" class="text-center py-12">
                            <div class="animate-spin h-12 w-12 mx-auto text-indigo-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500">Loading preferences...</p>
                        </div>
                        <div id="preferences-content" class="hidden space-y-10">
                            <!-- Categories and preferences will be loaded here -->
                        </div>
                        
                        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 mt-10 hidden" id="form-buttons">
                            <button type="button" id="cancel-button" class="w-full sm:w-auto inline-flex justify-center items-center px-5 py-2.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                Cancel
                            </button>
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-5 py-2.5 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200" id="submit-button">
                                Save Preferences
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const childSelect = document.getElementById('child_profile');
        const preferencesForm = document.getElementById('preferences-form');
        const preferencesContainer = document.getElementById('preferences-container');
        const loadingIndicator = document.getElementById('loading');
        const preferencesContent = document.getElementById('preferences-content');
        const formButtons = document.getElementById('form-buttons');
        const cancelButton = document.getElementById('cancel-button');
        
        function getImageUrl(path) {
            if (!path) return '{{ asset("images/placeholder.png") }}';
            
            if (path.startsWith('/')) {
                path = path.substring(1);
            }
            
            return '{{ asset("") }}' + path;
        }
        
        if (childSelect) {
            childSelect.addEventListener('change', function() {
                const childId = this.value;
                
                if (!childId) {
                    preferencesContainer.classList.add('hidden');
                    return;
                }
                
                // Update form action with selected child ID
                preferencesForm.action = preferencesForm.action.replace(/\/\d+$/, `/${childId}`);
                
                // Show loading state
                preferencesContainer.classList.remove('hidden');
                loadingIndicator.classList.remove('hidden');
                preferencesContent.classList.add('hidden');
                formButtons.classList.add('hidden');
                
                // Fetch preferences data for the selected child
                fetch(`/parent/preferences/${childId}?ajax=true`)
                    .then(response => response.json())
                    .then(data => {
                        // Hide loading indicator
                        loadingIndicator.classList.add('hidden');
                        
                        // Populate preferences content
                        preferencesContent.innerHTML = '';
                        
                        // Add categories and learning values
                        data.categories.forEach(category => {
                            const categorySection = document.createElement('div');
                            categorySection.className = 'mb-8 bg-gray-50 p-6 rounded-xl border border-gray-100 shadow-sm';
                            
                            // Category header with fixed image path
                            const categoryHeader = document.createElement('div');
                            categoryHeader.className = 'flex items-center mb-5';
                            categoryHeader.innerHTML = `
                                <div class="w-10 h-10 mr-4 bg-white p-2 rounded-full shadow-sm">
                                    <img src="${getImageUrl(category.icon)}" alt="${category.name}" class="w-full h-full object-contain">
                                </div>
                                <h2 class="text-xl font-semibold" style="color: ${category.color}">${category.name}</h2>
                            `;
                            
                            // Learning values grid
                            const valuesGrid = document.createElement('div');
                            valuesGrid.className = 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4';
                            
                            category.learning_values.forEach(value => {
                                const isSelected = data.selected_values.includes(value.id);
                                
                                const valueItem = document.createElement('div');
                                valueItem.className = 'relative';
                                valueItem.innerHTML = `
                                    <input type="checkbox" 
                                        id="value_${value.id}" 
                                        name="learning_values[]" 
                                        value="${value.id}" 
                                        class="peer absolute h-0 w-0 opacity-0"
                                        ${isSelected ? 'checked' : ''}>
                                    <label for="value_${value.id}" 
                                        class="flex flex-col items-center p-4 rounded-lg border-2 cursor-pointer transition-all duration-200 hover:shadow-md bg-white"
                                        style="border-color: ${value.color}; background-color: ${isSelected ? value.background_color : 'white'};">
                                        <div class="w-12 h-12 mb-3 flex items-center justify-center">
                                            <img src="${getImageUrl(value.icon)}" alt="${value.name}" class="w-full h-full object-contain">
                                        </div>
                                        <span class="text-sm font-medium text-center" style="color: ${value.color}">${value.name}</span>
                                    </label>
                                `;
                                
                                valuesGrid.appendChild(valueItem);
                            });
                            
                            categorySection.appendChild(categoryHeader);
                            categorySection.appendChild(valuesGrid);
                            preferencesContent.appendChild(categorySection);
                        });
                        
                        // Show preferences content and buttons
                        preferencesContent.classList.remove('hidden');
                        formButtons.classList.remove('hidden');
                        
                        // Add event listeners to checkboxes for styling
                        document.querySelectorAll('input[name="learning_values[]"]').forEach(checkbox => {
                            checkbox.addEventListener('change', function() {
                                const label = this.nextElementSibling;
                                const bgColor = this.checked ? 
                                    label.style.borderColor.replace('rgb', 'rgba').replace(')', ', 0.1)') : 
                                    'white';
                                label.style.backgroundColor = bgColor;
                                
                                // Add a subtle animation effect
                                label.classList.add('scale-105');
                                setTimeout(() => {
                                    label.classList.remove('scale-105');
                                }, 200);
                            });
                        });
                    })
                    .catch(error => {
                        console.error('Error loading preferences:', error);
                        loadingIndicator.classList.add('hidden');
                        preferencesContent.classList.remove('hidden');
                        preferencesContent.innerHTML = `
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700">Error loading preferences. Please try again.</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
            });
            
            // Cancel button resets the form
            if (cancelButton) {
                cancelButton.addEventListener('click', function() {
                    childSelect.value = '';
                    preferencesContainer.classList.add('hidden');
                });
            }
        }
    });
</script>
@endsection