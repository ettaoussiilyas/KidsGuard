@extends('layouts.parent_layout')

@section('title', 'Child Profiles')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Child Profiles</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('parent.child-profiles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Child
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @if(count($childProfiles) > 0)
            @foreach($childProfiles as $profile)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            {{ $profile->name }} ({{ $profile->age ?? 'Age not set' }})
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ $profile->avatarUrl }}" alt="{{ $profile->name }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                            
                            <div class="mb-3">
                                @if($profile->has_adhd)
                                    <span class="badge bg-info me-1">ADHD</span>
                                @endif
                                @if($profile->has_autism)
                                    <span class="badge bg-info me-1">Autism</span>
                                @endif
                            </div>
                            
                            @if($profile->special_needs)
                                <p><strong>Special Needs:</strong> {{ $profile->special_needs }}</p>
                            @endif
                            
                            @if($profile->interests)
                                <p><strong>Interests:</strong> {{ $profile->interests }}</p>
                            @endif
                            
                            <div class="mt-3">
                                <a href="{{ route('parent.child-profiles.edit', $profile) }}" class="btn btn-sm btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('parent.child-profiles.destroy', $profile) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this profile?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    <p>You haven't added any child profiles yet.</p>
                    <a href="{{ route('parent.child-profiles.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus"></i> Add Your First Child
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection