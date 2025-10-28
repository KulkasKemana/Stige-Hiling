<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>OTP Verification - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
    input::-webkit-inner-spin-button,
    input::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number] {
      -moz-appearance: textfield;
    }
    .otp-input:focus {
      outline: none;
      border: 2px solid #ff914d;
      box-shadow: 0 0 0 3px rgba(255, 145, 77, 0.1);
    }
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
      <h1 class="text-2xl font-extrabold mb-3 leading-tight">
        OTP VERIFICATION
      </h1>
      <p class="text-sm text-gray-600 mb-8">
        Please check your email <span class="font-semibold text-gray-900">{{ session('email') ?? 'your email' }}</span><br />
        to see the verification code
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

      <!-- OTP Form -->
      <form method="POST" action="{{ route('otp.verify.submit') }}" id="otpForm" class="mb-6">
        @csrf
        
        <!-- OTP Input Boxes -->
        <div class="flex justify-center space-x-3 mb-2">
          <input type="text" 
                 maxlength="1" 
                 name="otp1" 
                 id="otp1"
                 class="otp-input w-14 h-14 rounded-xl text-center text-xl border-2 border-gray-300 bg-[#f9f9f9] transition-all"
                 pattern="[0-9]"
                 inputmode="numeric"
                 required 
                 autofocus />
          <input type="text" 
                 maxlength="1" 
                 name="otp2" 
                 id="otp2"
                 class="otp-input w-14 h-14 rounded-xl text-center text-xl border-2 border-gray-300 bg-[#f9f9f9] transition-all"
                 pattern="[0-9]"
                 inputmode="numeric"
                 required />
          <input type="text" 
                 maxlength="1" 
                 name="otp3" 
                 id="otp3"
                 class="otp-input w-14 h-14 rounded-xl text-center text-xl border-2 border-gray-300 bg-[#f9f9f9] transition-all"
                 pattern="[0-9]"
                 inputmode="numeric"
                 required />
          <input type="text" 
                 maxlength="1" 
                 name="otp4" 
                 id="otp4"
                 class="otp-input w-14 h-14 rounded-xl text-center text-xl border-2 border-gray-300 bg-[#f9f9f9] transition-all"
                 pattern="[0-9]"
                 inputmode="numeric"
                 required />
        </div>
        
        <!-- Error Message Display -->
        <p id="errorMsg" class="text-red-500 text-sm text-center h-5 mb-4"></p>

        <!-- Verify Button -->
        <button type="submit" 
                id="verifyBtn"
                class="w-full bg-[#ff914d] text-white font-semibold rounded-lg py-3 text-lg hover:bg-[#ff7a1a] transition disabled:opacity-50 disabled:cursor-not-allowed">
          <span id="btnText">Verify</span>
          <span id="btnLoader" class="hidden">
            <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </span>
        </button>
      </form>

      <!-- Resend Code -->
      <div class="flex justify-center items-center text-sm text-gray-600 space-x-2">
        <span>Didn't receive code?</span>
        <button id="resendBtn" 
                type="button"
                onclick="resendCode()"
                class="text-blue-600 hover:underline font-semibold disabled:text-gray-400 disabled:cursor-not-allowed disabled:no-underline">
          Resend Code
        </button>
        <span id="resendTimer" class="text-gray-500"></span>
      </div>
    </div>
  </main>

  <script>
    // OTP Input Auto-Focus Logic
    const otpInputs = document.querySelectorAll('.otp-input');
    
    otpInputs.forEach((input, index) => {
      // Auto-move to next input
      input.addEventListener('input', function(e) {
        const value = e.target.value;
        
        // Only allow numbers
        if (!/^\d$/.test(value)) {
          e.target.value = '';
          return;
        }
        
        // Move to next input
        if (value.length === 1 && index < otpInputs.length - 1) {
          otpInputs[index + 1].focus();
        }
      });
      
      // Handle backspace
      input.addEventListener('keydown', function(e) {
        if (e.key === 'Backspace' && !e.target.value && index > 0) {
          otpInputs[index - 1].focus();
        }
      });
      
      // Handle paste
      input.addEventListener('paste', function(e) {
        e.preventDefault();
        const pastedData = e.clipboardData.getData('text').trim();
        
        if (/^\d{4}$/.test(pastedData)) {
          pastedData.split('').forEach((char, i) => {
            if (otpInputs[i]) {
              otpInputs[i].value = char;
            }
          });
          otpInputs[3].focus();
        }
      });
    });

    // Form Submit
    document.getElementById('otpForm').addEventListener('submit', function() {
      const verifyBtn = document.getElementById('verifyBtn');
      const btnText = document.getElementById('btnText');
      const btnLoader = document.getElementById('btnLoader');
      
      verifyBtn.disabled = true;
      btnText.classList.add('hidden');
      btnLoader.classList.remove('hidden');
    });

    // Resend Code Timer
    let resendTimeout = 60; // 60 seconds
    let resendInterval;

    function startResendTimer() {
      const resendBtn = document.getElementById('resendBtn');
      const resendTimer = document.getElementById('resendTimer');
      
      resendBtn.disabled = true;
      resendTimeout = 60;
      
      resendInterval = setInterval(() => {
        resendTimeout--;
        resendTimer.textContent = `(${resendTimeout}s)`;
        
        if (resendTimeout <= 0) {
          clearInterval(resendInterval);
          resendBtn.disabled = false;
          resendTimer.textContent = '';
        }
      }, 1000);
    }

    function resendCode() {
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      
      fetch("{{ route('otp.resend') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const errorMsg = document.getElementById('errorMsg');
          errorMsg.className = 'text-green-500 text-sm text-center h-5 mb-4';
          errorMsg.textContent = 'New code sent to your email!';
          startResendTimer();
          
          setTimeout(() => {
            errorMsg.textContent = '';
          }, 3000);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        const errorMsg = document.getElementById('errorMsg');
        errorMsg.className = 'text-red-500 text-sm text-center h-5 mb-4';
        errorMsg.textContent = 'Failed to resend code. Please try again.';
      });
    }

    // Start timer on page load
    window.addEventListener('DOMContentLoaded', function() {
      startResendTimer();
    });
  </script>
</body>
</html>