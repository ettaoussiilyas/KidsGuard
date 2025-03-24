@extends('layouts.parent_layout')

@section('title', 'Edit Child Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Child Profile: {{ $childProfile->name }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('parent.child-profiles.update', $childProfile) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3 text-center">
                            <img src="{{ $childProfile->avatarUrl }}" alt="{{ $childProfile->name }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Child's Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $childProfile->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $childProfile->age) }}" min="1" max="18">
                            @error('age')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                            <div class="form-text">Leave empty to keep current picture. Max size: 1MB</div>
                            @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="has_adhd" name="has_adhd" value="1" {{ old('has_adhd', $childProfile->has_adhd) ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_adhd">
                                    Has ADHD
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="has_autism" name="has_autism" value="1" {{ old('has_autism', $childProfile->has_autism) ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_autism">
                                    Has Autism
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="special_needs" class="form-label">Special Needs</label>
                            <textarea class="form-control @error('special_needs') is-invalid @enderror" id="special_needs" name="special_needs" rows="3">{{ old('special_needs', $childProfile->special_needs) }}</textarea>
                            @error('special_needs')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="interests" class="form-label">Interests</label>
                            <textarea class="form-control @error('interests') is-invalid @enderror" id="interests" name="interests" rows="3">{{ old('interests', $childProfile->interests) }}</textarea>
                            <div class="form-text">What does your child like? (e.g., dinosaurs, space, princesses)</div>
                            @error('interests')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('parent.child-profiles.index') }}" class="btn btn-secondary me-md-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection