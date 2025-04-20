<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
        
        if ($subscribers->isEmpty()) {
            return redirect()->back()->with('error', 'No subscribers found to send the newsletter to.');
        }
        
        // Log the start of the process
        Log::info('Starting newsletter delivery to ' . $subscribers->count() . ' subscribers');
        
        // Send email to each subscriber using queue
        foreach ($subscribers as $subscriber) {
            try {
                Log::info('Queueing newsletter for: ' . $subscriber->email);
                
                Mail::to($subscriber->email)
                    ->queue(new \App\Mail\Newsletter(
                        $request->subject,
                        $request->content,
                        $subscriber->name
                    ));
            } catch (\Exception $e) {
                Log::error('Failed to queue newsletter for ' . $subscriber->email . ': ' . $e->getMessage());
            }
        }
        
        return redirect()->back()->with('success', 'Newsletter queued for delivery to ' . $subscribers->count() . ' subscribers. Check the logs for details.');
    }
    
    // Add this method to your controller for testing
    public function testEmail()
    {
        try {
            Mail::raw('Test email from KidsGuard', function($message) {
                $message->to('your-email@example.com')
                        ->subject('Test Email');
            });
            return 'Test email sent successfully! Check your Mailtrap inbox.';
        } catch (\Exception $e) {
            return 'Error sending test email: ' . $e->getMessage();
        }
    }
}