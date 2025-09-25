<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>{{ $destination['name'] }} - Book Now | Healing Tour & Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; background:#f8f9fa; color:#333 }
    .container { max-width: 1200px; margin:0 auto; padding:20px }
    .main-content { display:grid; grid-template-columns:2fr 1fr; gap:40px; margin-bottom:40px }
    .left-section,.booking-card,.reviews-section { background:white; border-radius:12px; padding:25px; box-shadow:0 2px 12px rgba(0,0,0,0.08) }
    .book-btn { background:linear-gradient(135deg,#f59e0b,#f97316); color:#fff; border:none; padding:15px 25px; border-radius:8px; font-weight:600; width:100%; cursor:pointer }
    .book-btn:hover { transform:translateY(-2px) }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-10px) }
      to   { opacity: 1; transform: translateY(0) }
    }
    .animate-fadeInDown { animation: fadeInDown 0.3s ease-out forwards }
    @keyframes popupIn {
      from { opacity: 0; transform: translateY(-12px) scale(0.98) }
      to   { opacity: 1; transform: translateY(0) scale(1) }
    }
    @keyframes popupOut {
      from { opacity: 1; transform: translateY(0) scale(1) }
      to   { opacity: 0; transform: translateY(-12px) scale(0.98) }
    }
    .popup-animate-in { animation: popupIn 320ms cubic-bezier(.2,.9,.2,1) both }
    .popup-animate-out { animation: popupOut 240ms cubic-bezier(.4,0,.2,1) both }
    #arrowButton.rotate { transform: rotate(180deg) }
    #arrowButton i {
      display: inline-block;
      transition: transform 220ms cubic-bezier(.2,.9,.2,1);
      transform: rotate(0deg);
      transform-origin: center;
    }
    #arrowButton.rotate i { transform: rotate(180deg) }
  </style>
</head>
<body class="bg-white pt-16">
  <!-- Navbar -->
  <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-3 relative">
      <!-- Left: Logo -->
      <div class="flex items-center gap-3">
        <img src="{{ asset('assets/destinations/Logo_Healing_no_bg.png') }}" class="w-10 h-10 object-contain" alt="Logo">
        <div class="text-[11px] leading-[14px]">
          <div class="font-semibold text-black">Healing</div>
          <div class="text-black">Tour And Travel</div>
        </div>
      </div>

      <!-- Center: Navigation -->
      <nav class="flex space-x-8 text-[14px] font-medium text-black">
        <a href="/home" class="hover:underline transition-colors">Home</a>
        <a href="/schedule" class="hover:underline transition-colors">Schedule</a>
        <a href="/destinations" class="hover:underline transition-colors">Destinations</a>
      </nav>

      <!-- Right: User info -->
      <div class="flex items-center gap-3">
        @auth
          <button id="profileButton" class="flex items-center gap-3 bg-transparent p-0 focus:outline-none">
            <img src="assets/Profile-Icon.png" class="w-8 h-8 rounded-full object-cover" width="32" height="32"/>
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
          <a href="/register" class="ml-4 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition-colors">Register</a>
        @endauth
      </div>

      <!-- Profile dropdown -->
      @auth
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
    </div>
  </header>

  <div class="container">
    <!-- Header -->
    <div class="header flex items-center mb-6">
      <a href="/destinations" class="text-gray-600 text-xl mr-4">←</a>
      <div>
        <h1 class="text-2xl font-bold">{{ $destination['name'] }}</h1>
        <div class="text-gray-500 text-sm">{{ $destination['duration'] }} • {{ $destination['location'] ?? 'Travel Package' }}</div>
      </div>
    </div>

    <div class="main-content">
      <!-- Left -->
      <div class="left-section">
        <img src="{{ asset($destination['image']) }}" alt="{{ $destination['name'] }}" class="rounded-lg shadow-md w-full mb-6">

        <h2 class="text-lg font-semibold mb-2">Description</h2>
        <p class="text-sm leading-relaxed mb-4">{{ $destination['description'] }}</p>

        <h2 class="text-lg font-semibold mb-2">Facility</h2>
        <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
          <div><i class="fas fa-bed mr-2"></i>5 Bedrooms</div>
          <div><i class="fas fa-bus mr-2"></i>Transportation</div>
          <div><i class="fas fa-utensils mr-2"></i>Breakfast</div>
          <div><i class="fas fa-map-marked-alt mr-2"></i>Tour</div>
        </div>

        <h2 class="text-lg font-semibold mt-6 mb-2">Terms & Conditions</h2>
        <ul class="text-sm text-gray-600">
          <li><i class="fas fa-clock mr-2"></i>Check-in from 2pm & check-out at 12pm</li>
          <li><i class="fas fa-users mr-2"></i>Maximum 50 Person</li>
        </ul>
      </div>

      <!-- Right -->
      <div class="right-section flex flex-col gap-6">
        <div class="booking-card">
          <h3 class="text-xl font-bold mb-1">{{ $destination['name'] }}</h3>
          <p class="text-gray-500 text-sm mb-4">{{ $destination['location'] ?? 'Location Info' }}</p>

          <div class="mb-4">
            <p class="text-xs text-gray-500">From</p>
            <div class="text-lg font-bold text-gray-800">Rp {{ number_format($destination['price'], 0, ',', '.') }}/Person</div>
          </div>

          <form action="{{ route('book.store') }}" method="POST">
            @csrf
            <input type="hidden" name="destination_id" value="{{ $destination['id'] }}">
            <button type="submit" class="book-btn">Book Now</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Reviews dummy -->
    <div class="reviews-section mt-10">
      <h2 class="text-lg font-semibold mb-4">Ratings and Reviews</h2>
      <p class="text-gray-500 text-sm mb-6">No reviews yet for this trip</p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-[#3B2F33] text-white w-full">
    <div class="max-w-7xl mx-auto px-6 py-10">
      <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-10 md:gap-0">
        <div class="md:w-1/4 space-y-3">
          <div class="flex items-center space-x-2">
            <img class="w-8 h-8" height="32" src="{{ asset('assets/Logo_Healing_no_bg.png') }}" width="32"/>
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
          <p>Terms & Conditions</p>
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
</body>
</html>