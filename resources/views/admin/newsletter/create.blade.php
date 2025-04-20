@extends('layouts.admin_layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Send Newsletter</h1>
        <p class="text-gray-600">Compose and send a newsletter to {{ $subscribedCount }} subscribed users</p>
    </div>
    
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.newsletter.send') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                    required>
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea name="content" id="content" rows="15" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                    required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">
                    You can use HTML tags for formatting.
                </p>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Send Newsletter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        height: 400,
        toolbar: [
            ['Bold', 'Italic', 'Underline', 'Strike'],
            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
            ['Link', 'Unlink', 'Image'],
            ['Format', 'Font', 'FontSize'],
            ['TextColor', 'BGColor'],
            ['Maximize', 'Source']
        ]
    });
</script>
@endpush