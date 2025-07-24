<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OTP Verification</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    input::-webkit-inner-spin-button,
    input::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>
<body class="bg-[#f3f3f3] min-h-screen flex items-center justify-center p-6">
  <main class="bg-white rounded-3xl shadow-[0_0_20px_rgba(0,0,0,0.15)] max-w-4xl w-full p-10 sm:p-20 flex flex-col items-center">
    <h1 class="text-3xl font-extrabold mb-3">OTP Verification</h1>
    <p class="text-[#555] text-center text-[15px] leading-snug mb-10">
      Please check your email <span class="font-semibold">user@example.com</span><br />
      to see the verification code
    </p>

    <!-- OTP Input -->
    <form id="otp-form" class="flex space-x-4 mb-2" autocomplete="off">
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
    </form>

    <!-- error message -->
    <p id="error-msg" class="text-red-500 text-sm mt-1 mb-4 h-1"></p>

    <!-- Verify Button -->
    <button
      id="verify-btn"
      class="bg-[#ff914d] text-white font-semibold rounded-xl w-full max-w-md py-4 mt-4 mb-8 hover:bg-[#ff7a1a] transition-colors"
      type="button">
      Verify
    </button>

    <div class="max-w-md w-full flex justify-center text-sm text-gray-500 px-2">
      <button
        id="resend-btn"
        class="text-blue-600 hover:underline disabled:text-gray-400 disabled:cursor-not-allowed"
      >
        Resend Code
      </button>
      <span id="resend-timer" class="ml-2"></span>
    </div>
  </main>

    <script src="{{ asset('js/otp.js') }}"></script>

  </body>
</html>
