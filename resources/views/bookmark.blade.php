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
  </style>
 </head>
 <body class="bg-white">
  <!-- Navbar -->
  <nav class="sticky top-0 z-50 h-20 flex items-center justify-between px-8 bg-[#EDEDED] shadow-md">
  <div class="flex items-center gap-8">
    <div class="relative w-[340px] h-[130px] rounded-md">
      
      <img src="assets/logobg.png"
     alt="logo bg"
     class="absolute top-4 -left-10 w-[500px] h-[102px] object-cover z-0" />

      <div class="relative z-10 flex items-center h-full pl-4">
        <img src="assets/logo_healing_no_bg.png" class="h-16 w-auto mr-2" />
        <div class="text-left leading-tight">
          <h1 class="font-bold text-sm text-gray-800">Healing</h1>
          <p class="text-xs text-gray-500">Tour And Travel</p>
    </div>
  </div>
</div>
    <ul class="flex gap-6 font-Montserrat text-gray-700 -ml-20">
      <li><a href="#" class="hover:text-orange-500">Home</a></li>
      <li><a href="#" class="hover:text-orange-500">Calendar</a></li>
      <li><a href="#" class="hover:text-orange-500">Best Destination</a></li>
    </ul>
  </div>
   <div class="flex items-center space-x-4 transform -translate-x-20 relative">
    <div class="relative w-[350px]">
    <input
      type="text"
      placeholder="Search here"
      class="w-full pl-4 pr-10 py-3 text-sm rounded-full bg-white text-gray-600 placeholder-gray-400 border-none outline-none focus:ring-orange-400 focus:ring-2 transition"/>
    <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
  </div>
  <!-- notifikasi -->
  <button class="relative p-2.5 bg-white rounded-full shadow hover:bg-orange-50">
    <img src="assets/notif-icon.png" alt="Notif" class="w-5 h-5 object-contain" />
    <span class="absolute top-2 right-2 w-2 h-1"></span>
  </button>

  <!-- pesan -->
    <button class="relative p-2.5 bg-white rounded-full shadow hover:bg-orange-50">
  <div class="w-5 h-5 flex items-center justify-center">
    <img src="assets/msg-icon.png" alt="Pesan" class="w-full h-full object-contain" />
  </div>
  <span class="absolute top-2 right-2 w-3 h-3"></span>
    </button>

  <!-- profil -->
<button id="profileButton" class="relative p-2.5 bg-white rounded-full shadow hover:bg-orange-50">
  <img src="assets/profile-icon.png" alt="Profil" class="w-5 h-5 object-contain" />
</button>

<button id="arrowButton" class="text-white hover:text-orange-400 -ml-2px">
  <i id="arrowIcon" class="fas fa-chevron-down text-sm transition-transform duration-300"></i>
</button>

<!-- Profile dropdown -->
<div id="profileDropdown" class="absolute right-0 top-[55px] translate-x-[50px] w-[400px] bg-white rounded-2xl shadow-lg z-50 hidden">
  <div class="p-6">
    
    <!-- profil -->
    <div class="flex items-center space-x-4 mb-6 text-left">
      <div class="w-14 h-14 rounded-full border-2 border-gray-300 overflow-hidden">
        <img src="assets/profile-icon.png" alt="Profil" class="w-full h-full object-cover"/>
      </div>
      <div>
        <h1 class="text-lg font-semibold text-gray-900 leading-tight">StigeHealing</h1>
        <p class="text-sm text-gray-500 leading-tight">stigehealing@gmail.com</p>
      </div>
    </div>

    <!-- Statistik -->
    <div class="flex justify-center border-b border-gray-300 py-4 mb-6 text-center">
      <div class="px-4">
        <p class="text-xs font-semibold text-gray-700 mb-1">Reward Points</p>
        <p class="text-orange-600 font-semibold text-base">0</p>
      </div>
      <div class="px-4 border-l border-gray-300">
        <p class="text-xs font-semibold text-gray-700 mb-1">Travel Trips</p>
        <p class="text-orange-600 font-semibold text-base">0</p>
      </div>
      <div class="px-4">
        <p class="text-xs font-semibold text-gray-700 mb-1">Bucket List</p>
        <p class="text-orange-600 font-semibold text-base">0</p>
      </div>
    </div>

    <!-- Menu -->
    <nav class="space-y-6">
      <a class="flex items-center justify-between px-6 text-gray-900" href="#"> 
        <div class="flex items-center space-x-4">
          <i class="far fa-user text-gray-400 text-lg"></i>
          <span class="text-base font-normal">Profile</span>
        </div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </a>
      <a class="flex items-center justify-between px-6 text-gray-900" href="/bookmark">
        <div class="flex items-center space-x-4">
          <i class="far fa-bookmark text-gray-400 text-lg"></i>
          <span class="text-base font-normal">Bookmarked</span>
        </div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </a>
      <a class="flex items-center justify-between px-6 text-gray-900" href="#">
        <div class="flex items-center space-x-4">
          <i class="fas fa-globe-americas text-gray-400 text-lg"></i>
          <span class="text-base font-normal">Previous Trips</span>
        </div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </a>
      <a class="flex items-center justify-between px-6 text-gray-900" href="#">
        <div class="flex items-center space-x-4">
          <i class="fas fa-cog text-gray-400 text-lg"></i>
          <span class="text-base font-normal">Settings</span>
        </div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </a>
      <a class="flex items-center justify-between px-6 text-gray-900" href="/">
        <div class="flex items-center space-x-4">
          <i class="fas fa-sign-out-alt text-gray-400 text-lg"></i>
          <span class="text-base font-normal">Log Out</span>
        </div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </a>
    </nav>
  </div>
</div>
  </nav>
<script>
  document.querySelectorAll('#profileButton, #arrowButton').forEach(button => {
    button.addEventListener('click', (e) => {
      e.stopPropagation();  // prevent document click from firing immediately
      document.getElementById('arrowIcon').classList.toggle('rotate-180');
      const dropdown = document.getElementById('profileDropdown');
      if (dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
        dropdown.classList.add('animate-fadeInDown');
      } else {
        dropdown.classList.add('hidden');
        dropdown.classList.remove('animate-fadeInDown');
      }
    });
  });

  document.addEventListener('click', (e) => {
    const dropdown = document.getElementById('profileDropdown');
    const profileButton = document.getElementById('profileButton');
    const arrowButton = document.getElementById('arrowButton');
    if (!dropdown.contains(e.target) && !profileButton.contains(e.target) && !arrowButton.contains(e.target)) {
      if (!dropdown.classList.contains('hidden')) {
        dropdown.classList.add('hidden');
        dropdown.classList.remove('animate-fadeInDown');
        document.getElementById('arrowIcon').classList.remove('rotate-180');
      }
    }
  });
</script>