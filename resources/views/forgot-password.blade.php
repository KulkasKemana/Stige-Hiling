<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>
  </head>
  <body class="bg-[#f3f3f3] min-h-screen flex items-center justify-center p-6">
    <main class="bg-white rounded-3xl shadow-[0_0_20px_rgba(0,0,0,0.15)] max-w-4xl w-full p-10 sm:p-20 flex flex-col items-center h-[510px]">
      <h1 class="text-3xl font-extrabold mb-3">Forgot password</h1>
      <p class="text-gray-500 mb-16 text-center text-sm max-w-sm leading-relaxed">
        Enter your email account to reset your password
      </p>
      <form id="resetForm" class="w-full max-w-lg flex flex-col gap-6">
        <input
          type="email"
          placeholder="Email"
          class="border border-black rounded-xl py-3 px-5 text-base placeholder-black placeholder-opacity-80 focus:outline-none"
          required
        />
        <button
          type="submit"
          class="bg-[#ff914d] text-white font-semibold rounded-xl py-3 text-lg hover:bg-[#ff7a1a] transition-colors"
        >
          Reset Password
        </button>
      </form>
    <!-- Popup -->
    <div
      id="popup"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50"
    >
      <div
        id="popupContent"
        class="bg-white rounded-2xl px-10 py-8 flex flex-col items-center shadow-xl max-w-md w-full text-center opacity-0 scale-95 transition-all duration-300"
      >
        <div class="bg-orange-400 text-white rounded-full w-16 h-16 flex items-center justify-center mb-5">
          <i class="fas fa-envelope text-2xl"></i>
        </div>
        <h2 class="text-xl font-bold mb-2">Check your email</h2>
        <p class="text-gray-500 text-sm">
          We have sent password recovery instructions to your email
        </p>
      </div>
    </div>

    <script>
      const form = document.getElementById('resetForm');
      const popup = document.getElementById('popup');
      const popupContent = document.getElementById('popupContent');

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        popup.classList.remove('hidden');

        setTimeout(() => {
          popupContent.classList.remove('opacity-0', 'scale-95');
          popupContent.classList.add('opacity-100', 'scale-100');
        }, 50);

        setTimeout(() => {
          popupContent.classList.remove('opacity-100', 'scale-100');
          popupContent.classList.add('opacity-0', 'scale-95');
          setTimeout(() => {
            popup.classList.add('hidden');
          }, 300);
        }, 3000);
      });
    </script>
  </body>
</html>
