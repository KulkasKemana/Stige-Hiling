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

    // verify otp
    document.getElementById("verify-btn").addEventListener("click", () => {
    const otpInputs = document.querySelectorAll('input[name="otp[]"]');
    const otp = [...otpInputs].map(input => input.value).join('');
    const errorMsg = document.getElementById("error-msg");

    if (otp.length !== 4) {
      errorMsg.textContent = "Please enter the complete 4-digit code";
      errorMsg.classList.remove("text-green-600");
      errorMsg.classList.add("text-red-500");
      return;
    }

    // contoh OTP "1234"
    if (otp !== "1234") {
      errorMsg.textContent = "The OTP code you entered is incorrect";
      errorMsg.classList.remove("text-green-600");
      errorMsg.classList.add("text-red-500");
      return;
    }

    errorMsg.textContent = "OTP verified successfully!";
    errorMsg.classList.remove("text-red-500");
    errorMsg.classList.add("text-green-600");
  });

    // resend otp
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

      setTimeout(() => {
        resendBtn.textContent = "Resend Code";
        startResendCountdown(30);
      }, 1000);
    });