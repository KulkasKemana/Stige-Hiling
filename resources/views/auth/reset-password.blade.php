<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Reset Password - Healing Tour and Travel</title>
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
        RESET<br />PASSWORD
      </h1>
      <p class="text-sm text-gray-600 mb-8">
        Enter your new password below
      </p>

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

      <!-- Form -->
      <form method="POST" action="{{ route('password.reset.submit') }}" class="w-full space-y-4" id="resetForm">
        @csrf
        
        <!-- New Password -->
        <div class="relative">
          <input type="password" 
                 name="password" 
                 id="password" 
                 placeholder="New Password"
                 class="w-full border @error('password') border-red-500 @else border-black @enderror rounded-lg px-5 py-3 pr-12 text-base placeholder-black focus:outline-none focus:ring-2 focus:ring-[#ff914d]" 
                 required 
                 autofocus />
          <button type="button" 
                  onclick="togglePassword('password', 'eyeIcon1')" 
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 hover:text-gray-800">
            <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
          @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @else
            <p class="text-gray-500 text-xs mt-1">Minimum 8 characters</p>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div class="relative">
          <input type="password" 
                 name="password_confirmation" 
                 id="password_confirmation" 
                 placeholder="Confirm Password"
                 class="w-full border border-black rounded-lg px-5 py-3 pr-12 text-base placeholder-black focus:outline-none focus:ring-2 focus:ring-[#ff914d]" 
                 required />
          <button type="button" 
                  onclick="togglePassword('password_confirmation', 'eyeIcon2')" 
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 hover:text-gray-800">
            <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
          <p id="passwordMatch" class="text-xs mt-1 hidden"></p>
        </div>

        <!-- Password Strength Indicator -->
        <div class="space-y-2">
          <div class="flex items-center space-x-2">
            <div id="strengthBar" class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
              <div id="strengthFill" class="h-full bg-red-500 transition-all duration-300" style="width: 0%"></div>
            </div>
            <span id="strengthText" class="text-xs font-medium text-gray-500"></span>
          </div>
          <ul class="text-xs text-gray-600 space-y-1">
            <li id="check-length" class="flex items-center">
              <span class="w-4 text-red-500">✗</span> At least 8 characters
            </li>
            <li id="check-uppercase" class="flex items-center">
              <span class="w-4 text-red-500">✗</span> One uppercase letter
            </li>
            <li id="check-lowercase" class="flex items-center">
              <span class="w-4 text-red-500">✗</span> One lowercase letter
            </li>
            <li id="check-number" class="flex items-center">
              <span class="w-4 text-red-500">✗</span> One number
            </li>
          </ul>
        </div>

        <!-- Submit Button -->
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

  <script>
    // Toggle password visibility
    function togglePassword(fieldId, iconId) {
      const passwordInput = document.getElementById(fieldId);
      const eyeIcon = document.getElementById(iconId);
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        `;
      } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
      }
    }

    // Form submit loading state
    document.getElementById('resetForm').addEventListener('submit', function() {
      const submitBtn = document.getElementById('submitBtn');
      const btnText = document.getElementById('btnText');
      const btnLoader = document.getElementById('btnLoader');
      
      submitBtn.disabled = true;
      btnText.classList.add('hidden');
      btnLoader.classList.remove('hidden');
    });

    // Real-time password match validation
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const passwordMatch = document.getElementById('passwordMatch');

    passwordConfirmation.addEventListener('input', function() {
      if (passwordConfirmation.value === '') {
        passwordMatch.classList.add('hidden');
        passwordConfirmation.setCustomValidity('');
        return;
      }
      
      if (password.value !== passwordConfirmation.value) {
        passwordMatch.textContent = '✗ Passwords do not match';
        passwordMatch.className = 'text-red-500 text-xs mt-1';
        passwordConfirmation.setCustomValidity('Passwords do not match');
      } else {
        passwordMatch.textContent = '✓ Passwords match';
        passwordMatch.className = 'text-green-500 text-xs mt-1';
        passwordConfirmation.setCustomValidity('');
      }
      passwordMatch.classList.remove('hidden');
    });

    // Password strength checker
    password.addEventListener('input', function() {
      const value = password.value;
      const strengthFill = document.getElementById('strengthFill');
      const strengthText = document.getElementById('strengthText');
      
      let strength = 0;
      let strengthLabel = '';
      let strengthColor = '';
      
      // Check criteria
      const hasLength = value.length >= 8;
      const hasUppercase = /[A-Z]/.test(value);
      const hasLowercase = /[a-z]/.test(value);
      const hasNumber = /[0-9]/.test(value);
      
      // Update checklist
      document.getElementById('check-length').innerHTML = hasLength 
        ? '<span class="w-4 text-green-500">✓</span> At least 8 characters' 
        : '<span class="w-4 text-red-500">✗</span> At least 8 characters';
      
      document.getElementById('check-uppercase').innerHTML = hasUppercase 
        ? '<span class="w-4 text-green-500">✓</span> One uppercase letter' 
        : '<span class="w-4 text-red-500">✗</span> One uppercase letter';
      
      document.getElementById('check-lowercase').innerHTML = hasLowercase 
        ? '<span class="w-4 text-green-500">✓</span> One lowercase letter' 
        : '<span class="w-4 text-red-500">✗</span> One lowercase letter';
      
      document.getElementById('check-number').innerHTML = hasNumber 
        ? '<span class="w-4 text-green-500">✓</span> One number' 
        : '<span class="w-4 text-red-500">✗</span> One number';
      
      // Calculate strength
      if (hasLength) strength += 25;
      if (hasUppercase) strength += 25;
      if (hasLowercase) strength += 25;
      if (hasNumber) strength += 25;
      
      // Set strength label and color
      if (strength === 0) {
        strengthLabel = '';
        strengthColor = '#ef4444';
      } else if (strength === 25) {
        strengthLabel = 'Weak';
        strengthColor = '#ef4444';
      } else if (strength === 50) {
        strengthLabel = 'Fair';
        strengthColor = '#f59e0b';
      } else if (strength === 75) {
        strengthLabel = 'Good';
        strengthColor = '#3b82f6';
      } else {
        strengthLabel = 'Strong';
        strengthColor = '#10b981';
      }
      
      // Update UI
      strengthFill.style.width = strength + '%';
      strengthFill.style.backgroundColor = strengthColor;
      strengthText.textContent = strengthLabel;
      strengthText.style.color = strengthColor;
    });
  </script>
</body>
</html>