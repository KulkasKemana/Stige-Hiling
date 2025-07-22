<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
<body class="bg-[#f2f2f2] min-h-screen flex items-center justify-center p-6">
  <main
    class="bg-white rounded-3xl shadow-[0_0_30px_rgba(0,0,0,0.15)] max-w-4xl w-full p-16 flex flex-col items-center"
  >
    <h1 class="text-3xl font-extrabold mb-3">Forgot password</h1>
    <p class="text-gray-500 mb-16 text-center text-sm max-w-md">
      Enter your email account to reset your password
    </p>
    <form class="w-full max-w-lg flex flex-col gap-8">
      <input
        type="email"
        placeholder="Email"
        class="border border-black rounded-lg py-4 px-6 text-base placeholder-black placeholder-opacity-80 focus:outline-none"
        required
      />
      <button
        type="submit"
        class="bg-[#ff914d] text-white font-semibold rounded-lg py-4 text-lg hover:bg-[#ff7a1a] transition-colors"
      >
        Reset Password
      </button>
    </form>
  </main>
</body>
</html>