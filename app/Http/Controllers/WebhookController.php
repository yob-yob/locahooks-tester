<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class WebhookController extends Controller
{
    public function index()
    {
        return view('webhook.form');
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'webhook_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $quotes = [
            "The only way to do great work is to love what you do.",
            "Innovation distinguishes between a leader and a follower.",
            "Stay hungry, stay foolish.",
            "Your time is limited, don't waste it living someone else's life.",
            "The future belongs to those who believe in the beauty of their dreams."
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        try {
            $response = Http::post($request->webhook_url, [
                'quote' => $randomQuote,
                'timestamp' => now()->toIso8601String()
            ]);

            return back()->with('success', 'Quote sent successfully!');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Failed to send the quote. Please try again.'])
                ->withInput();
        }
    }
} 