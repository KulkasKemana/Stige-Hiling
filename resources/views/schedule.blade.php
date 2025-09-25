<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healing Tour & Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #333;
    }

    /* Ticket Card */
    .ticket-card {
      display: flex;
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .ticket-left {
      flex: 2;
      position: relative;
    }

    .ticket-left img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .ticket-info {
      position: absolute;
      bottom: 15px;
      left: 15px;
      color: white;
    }

    .ticket-info h2 {
      font-size: 20px;
      font-weight: bold;
    }

    .ticket-info p {
      font-size: 13px;
      opacity: 0.9;
    }

    .ticket-logo {
      margin-top: 5px;
      font-size: 11px;
    }

    .ticket-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      border-left: 2px dashed #d1d5db;
    }

    .ticket-right::before,
    .ticket-right::after {
      content: "";
      position: absolute;
      left: -12px;
      width: 24px;
      height: 24px;
      background: #fff;
      border-radius: 50%;
    }

    .ticket-right::before {
      top: -12px;
    }

    .ticket-right::after {
      bottom: -12px;
    }

    .show-btn {
      background: #fff;
      border: 1px solid #d1d5db;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .show-btn:hover {
      background: #f3f4f6;
    }

    /* Footer */
    footer {
      background: #3b2b25;
      color: white;
      padding: 40px 0 20px;
      margin-top: 80px;
    }

    footer h3 {
      color: #fff;
      margin-bottom: 15px;
      font-weight: bold;
    }

    footer ul {
      list-style: none;
      padding: 0;
    }

    footer ul li {
      margin-bottom: 6px;
      font-size: 14px;
      cursor: pointer;
    }

    footer ul li:hover {
      color: #fbbf24;
    }

    .footer-bottom {
      border-top: 1px solid #6b4f3a;
      margin-top: 30px;
      padding-top: 20px;
      text-align: center;
      font-size: 14px;
      color: #d1d5db;
    }
  </style>
</head>
<body>

  <!-- Header -->
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
    <a href="/schedule" class="text-[#F97316] hover:underline transition-colors">Schedule</a>
    <a href="/destinations" class="hover:underline transition-colors">Destinations</a>
  </nav>

  <!-- Right: User info -->
  <div class="flex items-center gap-3">
    @auth
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
    @else
      <a href="/login" class="text-sm font-medium text-gray-700 hover:text-orange-500 transition-colors">Login</a>
      <a href="/create-account" class="ml-4 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition-colors">Register</a>
    @endauth
  </div>

  <!-- Profile dropdown (only shown when authenticated) -->
  @auth
    <div id="profileDropdown" class="absolute right-6 top-full mt-2 min-w-[300px] max-w-[360px] w-auto bg-white rounded-2xl shadow-lg z-50 hidden overflow-auto">
      <div class="p-3 flex flex-col">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200 flex-shrink-0">
            <img src="assets/profile-icon.png" alt="Profil" class="w-full h-full object-cover"/>
          </div>
          <div class="flex-1 min-w-0">
            <div class="text-sm font-semibold text-gray-900 truncate">StigeHealing</div>
            <div class="text-[11px] text-gray-500 truncate">stigehealing@gmail.com</div>
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
              <a href="/keranjang" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="fas fa-shopping-cart text-gray-400 w-5 text-center"></i><span class="truncate">Keranjang</span></div>
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
  @endauth
  </header>
  <!-- Main -->
  <main class="max-w-4xl mx-auto mt-28 px-4">
    <h1 class="text-2xl font-bold mb-1">Your Schedule</h1>
    <p class="text-gray-600 mb-6">All active booking tickets</p>

    <!-- Ticket Kyoto -->
    <div class="ticket-card">
      <div class="ticket-left">
        <img src="assets/shrine.png" alt="Kyoto Japan">
        <div class="ticket-info">
          <h2>Kyoto - Japan</h2>
          <p>25 July 2024</p>
          <div class="ticket-logo">Healing Tour and Travel</div>
        </div>
      </div>
      <div class="ticket-right">
        <button class="show-btn">Show Details</button>
      </div>
    </div>

    <!-- Ticket Makkah -->
    <div class="ticket-card">
      <div class="ticket-left">
        <img src="assets/masjid.png" alt="Makkah Saudi Arabia">
        <div class="ticket-info">
          <h2>Makkah - Saudi Arabia</h2>
          <p>15 October 2024</p>
          <div class="ticket-logo">Healing Tour and Travel</div>
        </div>
      </div>
      <div class="ticket-right">
        <button class="show-btn">Show Details</button>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-[#3B2F33] text-white w-full">
  <div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-10 md:gap-0">
      <div class="md:w-1/4 space-y-3">
        <div class="flex items-center space-x-2">
          <img class="w-8 h-8" height="32" src="assets/Logo_Healing_no_bg.png" width="32"/>
          <div class="text-xs leading-tight">
            <p class="font-semibold">Healing</p>
            <p>Tour And Travel</p>
          </div>
        </div>
        <p class="text-[10px] leading-tight max-w-[180px]">
          Kami berkomitmen untuk memberikan pengalaman healing journey terbaik yang akan mengubah hidup anda menuju kebahagiaan dan kedamaian.
        </p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Destinations</p>
        <p>Saudi Arabia</p>
        <p>Japan</p>
        <p>Bali</p>
        <p>France</p>
        <p>Italia</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Follow Us</p>
        <p class="flex items-center gap-2"><i class="fas fa-globe"></i>@healingtourandtravel</p>
        <p class="flex items-center gap-2"><i class="fab fa-twitter"></i>@healingtourandtravel</p>
        <p class="flex items-center gap-2"><i class="fas fa-phone-alt"></i>+62 8909 9897 3563</p>
        <p class="flex items-center gap-2"><i class="fas fa-envelope"></i>healing@gmail.com</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Company</p>
        <p>About Us</p>
        <p>Partners</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Help</p>
        <p>Help Center</p>
        <p>FAQ</p>
        <p>Terms &amp; Conditions</p>
        <p>Privacy Policy</p>
      </div>
    </div>

    <div class="mt-10 border-t border-[#5A4E50] pt-4 text-[10px] text-center">
      Copyright © 2025 Healing Tour and Travel
    </div>

    <div class="flex justify-end mt-4">
      <a aria-label="WhatsApp" href="https://wa.me/62890998973563" target="_blank" rel="noopener noreferrer" class="bg-[#25D366] w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-[#1ebe57] transition-colors duration-300">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
      </a>
    </div>
  </div>
</footer>

</body>
</html>