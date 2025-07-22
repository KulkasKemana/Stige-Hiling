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
  <main
    class="bg-white rounded-3xl shadow-[0_0_20px_rgba(0,0,0,0.15)] max-w-4xl w-full p-10 sm:p-16 flex flex-col items-center"
  >
    <h1 class="text-3xl font-extrabold mb-3">OTP Verification</h1>
    <p class="text-[#555] text-center text-[15px] leading-snug mb-10">
  Please check your email <span class="font-semibold">user@example.com</span><br />
  to see the verification code
</p>

    <!-- OTP Input -->
    <form id="otp-form" class="flex space-x-4 mb-14" autocomplete="off">
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
      <input maxlength="1" name="otp[]" class="otp-input w-16 h-16 rounded-xl text-center text-xl bg-[#f3f3f3]" />
    </form>

    <!-- Verify Button -->
    <button
      id="verify-btn"
      class="bg-[#ff914d] text-white font-semibold rounded-xl w-full max-w-md py-4 mb-8 hover:bg-[#ff7a1a] transition-colors"
      type="button"
    >
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

  <script>
  // auto focus ke input berikutnya
  const inputs = document.querySelectorAll(".otp-input");
  inputs.forEach((input, index) => {
    input.addEventListener("input", () => {
      if (input.value.length === 1 && index < inputs.length - 1) {
        inputs[index + 1].focus();
      }
    });

    input.addEventListener("keydown", (e) => {
      if (e.key === "Backspace" && input.value === "" && index > 0) {
        inputs[index - 1].focus();
      }
    });
  });

  // === verify otp (simulasi) ===
  document.getElementById("verify-btn").addEventListener("click", () => {
    const otp = [...document.querySelectorAll('input[name="otp[]"]')]
      .map(input => input.value)
      .join('');

    if (otp.length !== 4) {
      alert("Please enter the complete 4-digit code");
      return;
    }

    // simulasi verifikasi berhasil
    alert("OTP verified: " + otp);
  });

  // === resend otp (simulasi) ===
  const resendBtn = document.getElementById("resend-btn");
  const resendTimer = document.getElementById("resend-timer");
  let countdownInterval;

  function startResendCountdown(duration) {
    let timeLeft = duration;
    resendBtn.disabled = true;
    updateTimerText(timeLeft);

    countdownInterval = setInterval(() => {
      timeLeft--;
      updateTimerText(timeLeft);

      if (timeLeft <= 0) {
        clearInterval(countdownInterval);
        resendBtn.disabled = false;
        resendTimer.textContent = '';
      }
    }, 1000);
  }

  function updateTimerText(seconds) {
    const minutes = String(Math.floor(seconds / 60)).padStart(2, '0');
    const secs = String(seconds % 60).padStart(2, '0');
    resendTimer.textContent = `(${minutes}:${secs})`;
  }

  resendBtn.addEventListener("click", () => {
    resendBtn.textContent = "Resending...";
    
    // simulasi loading 1 detik
    setTimeout(() => {
      resendBtn.textContent = "Resend Code";
      alert("OTP has been resent!");
      startResendCountdown(30); // 30 detik
    }, 1000);
  });
</script>
</body>
</html>