<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

// Add this to your protected $policies array
protected $policies = [
    // ... other policies
    \App\Models\ChildProfile::class => \App\Policies\ChildProfilePolicy::class,
];

}