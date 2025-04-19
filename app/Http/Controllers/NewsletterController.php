<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * Show the newsletter form for admin
     */
    public function showNewsletterForm()
    {
        $subscribedCount = NewsletterSubscription::where('is_subscribed', true)->count();
        return view('admin.newsletter.create', compact('subscribedCount'));
    }
    
    /**
     * Show the subscription form for parents
     */
    public function showSubscriptionForm()
    {
        $user = Auth::user();
        $isSubscribed = $user->isSubscribedToNewsletter();
        
        return view('parent.newsletter_subscription', compact('isSubscribed'));
    }
    
    /**
     * Toggle the user's newsletter subscription
     */
    public function toggleSubscription(Request $request)
    {
        $user = Auth::user();
        $isSubscribed = $request->has('subscribe');
        
        NewsletterSubscription::updateOrCreate(
            ['user_id' => $user->id],
            ['is_subscribed' => $isSubscribed]
        );
        
        $status = $isSubscribed ? 'subscribed to' : 'unsubscribed from';
        
        return redirect()->back()
            ->with('success', "You have successfully {$status} the newsletter.");
    }
    
    /**
     * Send newsletter to all subscribed users
     */
    // In your sendNewsletter method
    public function sendNewsletter(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        // Get all subscribed users
        $subscribers = NewsletterSubscription::where('is_subscribed', true)
            ->with('user')
            ->get()
            ->pluck('user');
        
        // Send email to each subscriber using queue
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->queue(new \App\Mail\Newsletter(
                    $request->subject,
                    $request->content,
                    $subscriber->name
                ));
        }
        
        return redirect()->back()->with('success', 'Newsletter queued for delivery to ' . $subscribers->count() . ' subscribers.');
    }
}