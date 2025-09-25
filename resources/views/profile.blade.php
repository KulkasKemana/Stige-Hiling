<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Travel Page
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: "Inter", sans-serif;
    }

    @font-face {
        font-family: "Callisten";
        src: url("fonts/callisten.ttf") format("truetype");
    }
    @keyframes fadeInDown {
     from { opacity: 0; transform: translateY(-10px); }
     to { opacity: 1; transform: translateY(0); }
   }
   .animate-fadeInDown {
     animation: fadeInDown 0.3s ease-out forwards;
   }
   @keyframes popupIn {
    from { opacity: 0; transform: translateY(-12px) scale(0.98); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
  }
  @keyframes popupOut {
    from { opacity: 1; transform: translateY(0) scale(1); }
    to   { opacity: 0; transform: translateY(-12px) scale(0.98); }
  }
  .popup-animate-in { animation: popupIn 320ms cubic-bezier(.2,.9,.2,1) both; }
  .popup-animate-out { animation: popupOut 240ms cubic-bezier(.4,0,.2,1) both; }
  #arrowButton.rotate {
    transform: rotate(180deg);
  }

  #arrowButton i {
    display: inline-block;
    transition: transform 220ms cubic-bezier(.2,.9,.2,1);
    transform: rotate(0deg);
    transform-origin: center;
  }
  #arrowButton.rotate i {
    transform: rotate(180deg);
  }
  </style>
 </head>
 <body class="bg-white">
  <!-- Navbar -->
  <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-3 relative">
  <!-- Left: Logo -->
  <div class="flex items-center gap-3">
    <img src="assets/Logo_Healing_no_bg.png" class="w-10 h-10 object-contain" width="40" height="40" alt="Logo" />
    <div class="text-[11px] leading-[14px]">
      <div class="font-semibold text-black">Healing</div>
      <div class="text-black">Tour And Travel</div>
    </div>
  </div>

  <!-- Center: Navigation -->
  <nav class="flex space-x-8 text-[14px] font-medium text-black">
    <a href="/home" class="hover:underline transition-colors">Home</a>
    <a href="/schedule" class="hover:underline transition-colors">Schedule</a>
    <a href="#" class="hover:underline transition-colors">Destinations</a>
  </nav>

  <!-- Right: User info -->
  <div class="flex items-center gap-3">
    <button id="profileButton" class="flex items-center gap-3 bg-transparent p-0 focus:outline-none">
      <img src="assets/Profile-Icon.png" class="w-8 h-8 rounded-full object-cover" width="32" height="32" />
      <div class="min-w-[120px] text-right">
        <div class="text-sm font-semibold">{{ Auth::user()->name }}</div>
        <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
      </div>
    </button>
    <button id="arrowButton" aria-label="Open user menu" class="bg-gray-100 w-9 h-9 rounded-full flex items-center justify-center ml-1 focus:outline-none hover:bg-gray-200 transition">
      <i class="fas fa-chevron-down text-gray-700 text-sm"></i>
    </button>
  </div>

  <!-- Profile dropdown (moved inside header so it follows the navbar) -->
  <div id="profileDropdown" class="absolute right-6 top-full mt-2 min-w-[300px] max-w-[360px] w-auto bg-white rounded-2xl shadow-lg z-50 hidden overflow-auto">
      <div class="p-3 flex flex-col">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200 flex-shrink-0">
            <img src="assets/profile-icon.png" alt="Profil" class="w-full h-full object-cover"/>
          </div>
          <div class="flex-1 min-w-0">
            <div class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</div>
            <div class="text-[11px] text-gray-500 truncate">{{ Auth::user()->email }}</div>
          </div>
        </div>

        <div class="flex items-center justify-between bg-gray-50 rounded-lg py-1.5 px-2 text-center text-xs mt-3">
          <div class="flex-1">
            <div class="font-semibold text-gray-700">0</div>
            <div class="text-gray-500">Points</div>
          </div>
          <div class="w-px h-6 bg-gray-200 mx-2"></div>
          <div class="flex-1">
            <div class="font-semibold text-gray-700">0</div>
            <div class="text-gray-500">Trips</div>
          </div>
          <div class="w-px h-6 bg-gray-200 mx-2"></div>
          <div class="flex-1">
            <div class="font-semibold text-gray-700">0</div>
            <div class="text-gray-500">Bucket</div>
          </div>
        </div>

        <nav class="mt-3 overflow-auto">
          <ul class="flex flex-col divide-y divide-gray-100 text-sm">
            <li>
              <a href="/profile" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="far fa-user text-gray-400 w-5 text-center"></i><span class="truncate">Profile</span></div>
                <i class="fas fa-chevron-right text-gray-400"></i>
              </a>
            </li>
            <li>
              <a href="/bookmark" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="far fa-bookmark text-gray-400 w-5 text-center"></i><span class="truncate">Bookmarked</span></div>
                <i class="fas fa-chevron-right text-gray-400"></i>
              </a>
            </li>
            <li>
              <a href="/" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="fas fa-sign-out-alt text-gray-400 w-5 text-center"></i><span class="truncate">Log Out</span></div>
                <i class="fas fa-chevron-right text-gray-400"></i>
              </a>
            </li>
          </ul>
        </nav>

        <div class="mt-3 text-center text-[11px] text-gray-400 py-1">Healing Tour & Travel</div>
      </div>
    </div>
  </header>
    <!-- Main -->
    <div class="bg-white p-6 sm:p-10 min-h-[calc(100vh-80px)] flex items-center justify-center sticky top-0">
      <main class="max-w-4xl w-full mx-auto">
        <h1 class="text-black text-lg font-semibold mb-4">My Profile</h1>
        <section class="flex items-center justify-between border border-gray-300 rounded-lg p-5 mb-8">
          <div class="flex items-center space-x-4">
            <div class="relative">
              <img class="w-16 h-16 rounded-full border-2 border-orange-400 object-cover" src="assets/profile-icon.png" alt="Profile" />
              <div class="absolute bottom-0 right-0 bg-white rounded-full border border-gray-300 cursor-pointer w-6 h-6 flex items-center justify-center transition-colors duration-300 hover:bg-gray-100">
                <i class="fas fa-camera text-xs text-gray-600 transition-colors duration-300 hover:text-gray-600"></i>
              </div>
            </div>
            <div>
              <p class="text-black font-semibold text-base leading-tight">Stige Healing</p>
              <p class="text-gray-400 text-xs leading-tight">User</p>
              <p class="text-gray-400 text-xs leading-tight">Garut, Indonesia</p>
            </div>
          </div>
          <button class="flex items-center space-x-1 border border-gray-300 rounded-full px-4 py-1 text-xs text-black font-semibold hover:bg-gray-100" type="button">
            <span>Edit</span>
            <i class="fas fa-pencil-alt text-xs"></i>
          </button>
        </section>
        <section class="border border-gray-300 rounded-lg p-6 grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
  <!-- Header Row -->
  <div class="sm:col-span-2 flex justify-between items-center mb-4">
    <p class="text-black font-semibold text-sm">Personal Information</p>
    <button class="flex items-center space-x-1 border border-gray-300 rounded-full px-4 py-1 text-xs text-black font-semibold hover:bg-gray-100" type="button">
      <span>Edit</span>
      <i class="fas fa-pencil-alt text-xs"></i>
    </button>
  </div>
  <!-- First Name -->
  <div>
    <p class="text-gray-400 text-xs mb-1">First Name</p>
    <p class="text-black text-sm font-semibold">{{ Auth::user()->name }}</p>
  </div>
  <!-- Last Name -->
  <div>
    <p class="text-gray-400 text-xs mb-1">Last Name</p>
    <p class="text-black text-sm font-semibold">Healing</p>
  </div>
  <!-- Email Address -->
  <div>
    <p class="text-gray-400 text-xs mb-1">Email Address</p>
    <p class="text-black text-sm font-semibold">{{ Auth::user()->email }}</p>
  </div>
  <!-- Phone Number -->
  <div>
    <p class="text-gray-400 text-xs mb-1">Phone Number</p>
    <p class="text-black text-sm font-semibold">+62 xxx-xxx-xx</p>
  </div>
  <!-- Location (spanning both columns) -->
  <div class="sm:col-span-2">
    <p class="text-gray-400 text-xs mb-1">Location</p>
    <p class="text-black text-sm font-semibold">Garut, Indonesia</p>
  </div>
</section>
      </main>
    </div>

    <!-- Footer -->
    <footer class="bg-[#EDEDED] py-4">
      <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col sm:flex-row items-center justify-between">
          <div class="text-center sm:text-left mb-4 sm:mb-0">
            <p class="text-gray-600 text-sm">
              &copy; 2023 Travel Page. All rights reserved.
            </p>
          </div>
          <div class="flex gap-4">
            <a href="#" class="text-gray-600 hover:text-orange-500 transition">Privacy Policy</a>
            <a href="#" class="text-gray-600 hover:text-orange-500 transition">Terms of Service</a>
          </div>
          <!-- script dropdown profile -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('profileButton');
    const arrowButton = document.getElementById('arrowButton');
    const profileDropdown = document.getElementById('profileDropdown');
    if (!profileDropdown) return;

    function onAnimationEnd(e) {
      if (e.target !== profileDropdown) return;
      if (profileDropdown.classList.contains('popup-animate-out')) {
        profileDropdown.classList.remove('popup-animate-out');
        profileDropdown.classList.add('hidden');
      } else if (profileDropdown.classList.contains('popup-animate-in')) {
        profileDropdown.classList.remove('popup-animate-in');
      }
    }

    profileDropdown.addEventListener('animationend', onAnimationEnd);

    function openDropdown(evt) {
      evt?.stopPropagation();
      profileDropdown.classList.remove('hidden');
      profileDropdown.classList.add('show');
      // restart animation
      profileDropdown.classList.remove('popup-animate-out');
      // force reflow
      void profileDropdown.offsetWidth;
      profileDropdown.classList.add('popup-animate-in');
      arrowButton?.classList.add('rotate');
    }

    function closeDropdown(evt) {
      evt?.stopPropagation();
      profileDropdown.classList.remove('popup-animate-in');
      profileDropdown.classList.remove('show');
      // start out animation; animationend will add hidden
      profileDropdown.classList.add('popup-animate-out');
      arrowButton?.classList.remove('rotate');
    }

    function toggleDropdown(e) {
      e?.stopPropagation();
      if (profileDropdown.classList.contains('hidden')) openDropdown(e); else closeDropdown(e);
    }

    profileButton?.addEventListener('click', toggleDropdown);
    arrowButton?.addEventListener('click', toggleDropdown);

    // keep clicks inside dropdown from closing it
    profileDropdown.addEventListener('click', function (e) { e.stopPropagation(); });

    // click outside closes dropdown
    window.addEventListener('click', function (event) {
      if (!profileDropdown.classList.contains('hidden')) {
        if (!profileButton?.contains(event.target) && !arrowButton?.contains(event.target) && !profileDropdown.contains(event.target)) {
          closeDropdown();
        }
      }
    });
  });
</script>
        </div>
      </div>
    </footer>
  </body>
</html>