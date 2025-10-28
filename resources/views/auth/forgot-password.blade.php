<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Forgot Password - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
  </style>
</head>
<body class="bg-[#f5f5f7] min-h-screen flex items-center justify-center p-6">
  <main class="bg-white rounded-[40px] shadow-[0_0_30px_rgba(0,0,0,0.15)] max-w-xl w-full p-8 md:p-14">
    <div class="w-full max-w-md mx-auto">
      
      <!-- Logo & Brand -->
      <div class="flex items-center space-x-3 mb-8">
        <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" alt="logo" class="w-10 h-10 object-contain" />
        <div class="text-sm font-bold leading-tight">
          Healing<br/>Tour And Travel
        </div>
      </div>

      <!-- Header -->
      <h1 class="text-2xl font-extrabold mb-2 leading-tight">
        FORGOT<br />PASSWORD?
      </h1>
      <p class="text-sm text-gray-600 mb-8">
        Enter your email account to reset your password
      </p>

      {{-- Success Message --}}
      @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
          {{ session('success') }}
        </div>
      @endif

      {{-- Error Messages --}}
      @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
          <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
              <li class="text-sm">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Info Message --}}
      @if(session('info'))
        <div class="mb-4 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-lg">
          {{ session('info') }}
        </div>
      @endif

      <!-- Form -->
      <form method="POST" action="{{ route('forgot-password.send') }}" class="w-full space-y-4" id="forgotForm">
        @csrf
        
        <div>
          <input type="email" 
                 name="email" 
                 placeholder="Email" 
                 value="{{ old('email') }}"
                 class="w-full border @error('email') border-red-500 @else border-black @enderror rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none focus:ring-2 focus:ring-[#ff914d]" 
                 required 
                 autofocus />
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" 
                id="submitBtn"
                class="w-full bg-[#ff914d] text-white font-semibold rounded-lg py-3 text-lg hover:bg-[#ff7a1a] transition disabled:opacity-50 disabled:cursor-not-allowed">
          <span id="btnText">Reset Password</span>
          <span id="btnLoader" class="hidden">
            <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </span>
        </button>
      </form>

      <!-- Back to Login -->
      <p class="text-center mt-6 text-sm">
        Remember your password?
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Back to Sign In</a>
      </p>
    </div>
  </main>

  <!-- Success Popup -->
  <div id="successPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-2xl px-10 py-8 flex flex-col items-center shadow-xl max-w-md w-full text-center transform transition-all duration-300 scale-95 opacity-0">
      <div class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
      </div>
      <h2 class="text-xl font-bold mb-2">Check your email</h2>
      <p class="text-gray-500 text-sm mb-6">
        We have sent a verification code to your email address
      </p>
      <button onclick="closePopup()" class="bg-[#ff914d] text-white px-8 py-2 rounded-lg hover:bg-[#ff7a1a] transition">
        OK
      </button>
    </div>
  </div>

  <script>
    // Form submit loading state
    document.getElementById('forgotForm').addEventListener('submit', function() {
      const submitBtn = document.getElementById('submitBtn');
      const btnText = document.getElementById('btnText');
      const btnLoader = document.getElementById('btnLoader');
      
      submitBtn.disabled = true;
      btnText.classList.add('hidden');
      btnLoader.classList.remove('hidden');
    });

    // Show popup if success message exists
    @if(session('success'))
      window.addEventListener('DOMContentLoaded', function() {
        showPopup();
      });
    @endif

    function showPopup() {
      const popup = document.getElementById('successPopup');
      const content = popup.querySelector('div');
      
      popup.classList.remove('hidden');
      setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }, 10);
    }

    function closePopup() {
      const popup = document.getElementById('successPopup');
      const content = popup.querySelector('div');
      
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        popup.classList.add('hidden');
        // Redirect to OTP page
        window.location.href = "{{ route('otp.verify') }}";
      }, 300);
    }
  </script>
</body>
</html>