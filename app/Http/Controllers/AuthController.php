<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm(Request $request)
    {
        // Store the intended URL if it exists in query parameter
        if ($request->has('redirect')) {
            $redirectUrl = $request->get('redirect');
            
            // Validate and store in session with custom key
            if ($this->isValidRedirectUrl($redirectUrl)) {
                session(['healing_redirect' => $redirectUrl]);
                Log::info('Stored redirect URL in session', ['url' => $redirectUrl]);
            }
        }
        
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Get redirect URL with proper priority
            $redirectUrl = $this->getRedirectUrl($request);

            Log::info('User logged in', [
                'user' => Auth::user()->email,
                'redirect_to' => $redirectUrl
            ]);

            return redirect($redirectUrl)->with('success', 'Welcome back, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show register form
     */
    public function showRegisterForm(Request $request)
    {
        // Store the intended URL if it exists
        if ($request->has('redirect')) {
            $redirectUrl = $request->get('redirect');
            
            if ($this->isValidRedirectUrl($redirectUrl)) {
                session(['healing_redirect' => $redirectUrl]);
            }
        }
        
        return view('auth.register');
    }

    /**
     * Handle register request
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        // Get redirect URL
        $redirectUrl = $this->getRedirectUrl($request);

        return redirect($redirectUrl)->with('success', 'Account created successfully! Welcome to Healing Tour and Travel.');
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Get redirect URL with proper priority
     */
    private function getRedirectUrl(Request $request)
    {
        $redirectUrl = null;
        
        // Priority 1: Hidden form input
        if ($request->has('redirect') && !empty($request->input('redirect'))) {
            $redirectUrl = $request->input('redirect');
            Log::info('Redirect from form input', ['url' => $redirectUrl]);
        }
        
        // Priority 2: Our custom session key
        if (!$redirectUrl && session()->has('healing_redirect')) {
            $redirectUrl = session()->pull('healing_redirect');
            Log::info('Redirect from custom session', ['url' => $redirectUrl]);
        }
        
        // Priority 3: Laravel's default intended URL
        if (!$redirectUrl && session()->has('url.intended')) {
            $redirectUrl = session()->pull('url.intended');
            Log::info('Redirect from Laravel intended', ['url' => $redirectUrl]);
        }
        
        // Priority 4: Default to home
        if (!$redirectUrl) {
            $redirectUrl = route('home');
            Log::info('Redirect to default home');
        }

        // Validate and return
        return $this->validateRedirectUrl($redirectUrl);
    }

    /**
     * Check if redirect URL is valid and safe
     */
    private function isValidRedirectUrl($url)
    {
        if (empty($url)) {
            return false;
        }

        // Allow relative URLs that start with /
        if (strpos($url, '/') === 0 && strpos($url, '//') !== 0) {
            return true;
        }
        
        // Allow absolute URLs from our domain
        $appUrl = rtrim(config('app.url'), '/');
        $parsedUrl = parse_url($url);
        $parsedAppUrl = parse_url($appUrl);
        
        if (isset($parsedUrl['host']) && isset($parsedAppUrl['host'])) {
            return $parsedUrl['host'] === $parsedAppUrl['host'];
        }
        
        return false;
    }

    /**
     * Validate redirect URL to prevent open redirect attacks
     */
    private function validateRedirectUrl($url)
    {
        if ($this->isValidRedirectUrl($url)) {
            return $url;
        }
        
        Log::warning('Invalid redirect URL, defaulting to home', ['url' => $url]);
        return route('home');
    }
}