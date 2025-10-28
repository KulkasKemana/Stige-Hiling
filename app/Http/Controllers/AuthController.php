<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\OTPMail;

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

    // ==================== FORGOT PASSWORD METHODS ====================

    /**
     * Show forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send OTP to email
     */
    public function sendResetOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'We could not find an account with that email address.',
        ]);

        $email = $request->email;

        // Generate 4-digit OTP
        $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        // Store OTP in session with expiration (10 minutes)
        session([
            'reset_email' => $email,
            'reset_otp' => $otp,
            'reset_otp_expires' => now()->addMinutes(10),
            'otp_attempts' => 0,
        ]);

        // Send OTP via email
        try {
            Mail::to($email)->send(new OTPMail($otp));
            
            Log::info('OTP sent for password reset', [
                'email' => $email,
                'otp' => $otp, // Remove in production
            ]);

            return redirect()->route('otp.verify')
                ->with('success', 'Verification code has been sent to your email.')
                ->with('email', $email);
        } catch (\Exception $e) {
            Log::error('Failed to send OTP email', [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);

            return back()->withErrors([
                'email' => 'Failed to send verification code. Please try again.',
            ])->withInput();
        }
    }

    /**
     * Show OTP verification form
     */
    public function showOTPForm()
    {
        // Check if there's an active reset session
        if (!session()->has('reset_email') || !session()->has('reset_otp')) {
            return redirect()->route('forgot-password')
                ->with('info', 'Please enter your email to receive a verification code.');
        }

        // Check if OTP expired
        if (now()->isAfter(session('reset_otp_expires'))) {
            session()->forget(['reset_email', 'reset_otp', 'reset_otp_expires']);
            return redirect()->route('forgot-password')
                ->with('info', 'Verification code has expired. Please request a new one.');
        }

        return view('auth.otp');
    }

    /**
     * Verify OTP and proceed to reset password
     */
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp1' => 'required|numeric|digits:1',
            'otp2' => 'required|numeric|digits:1',
            'otp3' => 'required|numeric|digits:1',
            'otp4' => 'required|numeric|digits:1',
        ]);

        // Combine OTP digits
        $enteredOTP = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;

        // Check if OTP session exists
        if (!session()->has('reset_otp')) {
            return redirect()->route('forgot-password')
                ->with('info', 'Session expired. Please request a new verification code.');
        }

        // Check if OTP expired
        if (now()->isAfter(session('reset_otp_expires'))) {
            session()->forget(['reset_email', 'reset_otp', 'reset_otp_expires', 'otp_attempts']);
            return redirect()->route('forgot-password')
                ->with('info', 'Verification code has expired. Please request a new one.');
        }

        // Increment attempts
        $attempts = session('otp_attempts', 0) + 1;
        session(['otp_attempts' => $attempts]);

        // Check max attempts (5 attempts)
        if ($attempts > 5) {
            session()->forget(['reset_email', 'reset_otp', 'reset_otp_expires', 'otp_attempts']);
            return redirect()->route('forgot-password')
                ->with('info', 'Too many incorrect attempts. Please request a new verification code.');
        }

        // Verify OTP
        if ($enteredOTP === session('reset_otp')) {
            // OTP is correct, set verified flag
            session(['otp_verified' => true]);
            
            Log::info('OTP verified successfully', [
                'email' => session('reset_email'),
            ]);

            return redirect()->route('password.reset.form')
                ->with('success', 'Verification successful! Please enter your new password.');
        }

        // OTP is incorrect
        $remainingAttempts = 5 - $attempts;
        
        return back()->withErrors([
            'otp' => "Invalid verification code. You have {$remainingAttempts} attempt(s) remaining.",
        ]);
    }

    /**
     * Resend OTP
     */
    public function resendOTP(Request $request)
    {
        // Check if there's an active reset session
        if (!session()->has('reset_email')) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired.',
            ], 400);
        }

        $email = session('reset_email');

        // Generate new OTP
        $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        // Update session
        session([
            'reset_otp' => $otp,
            'reset_otp_expires' => now()->addMinutes(10),
            'otp_attempts' => 0,
        ]);

        // Send OTP via email
        try {
            Mail::to($email)->send(new OTPMail($otp));
            
            Log::info('OTP resent for password reset', [
                'email' => $email,
                'otp' => $otp, // Remove in production
            ]);

            return response()->json([
                'success' => true,
                'message' => 'New verification code has been sent.',
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to resend OTP email', [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send verification code.',
            ], 500);
        }
    }

    /**
     * Show reset password form
     */
    public function showResetPasswordForm()
    {
        // Check if OTP was verified
        if (!session()->has('otp_verified') || !session('otp_verified')) {
            return redirect()->route('forgot-password')
                ->with('info', 'Please verify your email first.');
        }

        return view('auth.reset-password');
    }

    /**
     * Handle password reset
     */
    public function resetPassword(Request $request)
    {
        // Check if OTP was verified
        if (!session()->has('otp_verified') || !session('otp_verified')) {
            return redirect()->route('forgot-password')
                ->with('info', 'Please verify your email first.');
        }

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $email = session('reset_email');

        // Find user and update password
        $user = User::where('email', $email)->first();

        if (!$user) {
            session()->forget(['reset_email', 'reset_otp', 'reset_otp_expires', 'otp_verified', 'otp_attempts']);
            return redirect()->route('forgot-password')
                ->withErrors(['email' => 'User not found.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Log::info('Password reset successful', [
            'email' => $email,
        ]);

        // Clear all reset sessions
        session()->forget(['reset_email', 'reset_otp', 'reset_otp_expires', 'otp_verified', 'otp_attempts']);

        return redirect()->route('login')
            ->with('success', 'Password has been reset successfully! Please login with your new password.');
    }

    // ==================== HELPER METHODS ====================

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