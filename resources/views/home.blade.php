<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Travel Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
     to   { opacity: 1; transform: translateY(0); }
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
 <body class="bg-white pt-16">
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
    <a href="/home" class="text-[#F97316] hover:underline transition-colors">Home</a>
    <a href="/schedule" class="hover:underline transition-colors">Schedule</a>
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
      <a href="/register" class="ml-4 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition-colors">Register</a>
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
  </header>
  <!-- Hero Section -->
  <section class="relative w-full h-[400px] sm:h-[480px] md:h-[520px] lg:h-[560px] xl:h-[600px]">
   <img 
    src="assets/homepage-img.png" 
    class="w-full h-full object-cover" 
    width="1440" 
    height="600"
   />
   <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center px-6 sm:px-12 md:px-20 lg:px-28 xl:px-36">
    <h1 class="text-white font-Montserrat text-3xl sm:text-4xl md:text-5xl lg:text-6xl max-w-lg leading-tight">
     Explore the<br/>
     Beautiful <span class="text-orange-400 italic" style="font-family: 'callisten'">World!</span>
    </h1>
    <div class="mt-8 flex space-x-4">
     <button class="border border-white text-white text-sm sm:text-base font-Montserrat rounded-full px-6 py-2 flex items-center space-x-2 hover:bg-white hover:text-orange-400 transition">
      <span>Explore Tours</span>
      <i class="fas fa-arrow-right"></i>
     </button>
    </div>
   </div>
  </section>
  <!-- Best Destinations Title -->
  <section class="text-center mt-12 px-6 sm:px-12 md:px-20 lg:px-28 xl:px-36">
   <h2 class="font-extrabold text-3xl sm:text-4xl mb-2">
    Best Destinations
   </h2>
   <p class="text-xs sm:text-sm font-semibold text-gray-900 max-w-2xl mx-auto">
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
      nibh euismod tincidunt ut laoreet dolore magna a
   </p>
  </section>
  <!-- Carousel Section -->
  <!-- Carousel Section Start -->
  <section
    id="carousel"
    class="mt-20 relative bg-gradient-to-r from-white via-gray-100 to-white py-16 overflow-visible"
  >
    <div class="max-w-7xl mx-auto px-4 relative flex items-center justify-center">
      <button
        id="prevBtn"
        aria-label="Previous"
        class="z-20 absolute left-6 top-1/2 -translate-y-1/2 bg-orange-400 hover:bg-orange-500 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg"
      >
        <i class="fas fa-chevron-left text-2xl"></i>
      </button>
      <div
        id="carouselItems"
        class="flex space-x-6 overflow-hidden max-w-5xl items-center justify-center"
      >
        <div
          class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90 transition-all duration-500"
        >
          <img
            alt="Beach relaxation scene with deck chairs and sunny sky"
            class="w-full h-full object-cover"
            src="assets/chill.png"
            width="160"
            height="213"
          />
        </div>
        <div
          class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90 transition-all duration-500"
        >
          <img
            alt="Vintage off-road vehicle parked in nature with trees"
            class="w-full h-full object-cover"
            src="assets/jeep.png"
            width="192"
            height="256"
          />
        </div>
        <div
          class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 transition-all duration-500"
        >
          <img
            alt="Middle Eastern mosque with blue sky and birds flying"
            class="w-full h-full object-cover"
            src="assets/masjid.png"
            width="320"
            height="426"
          />
          <button
            aria-label="Bookmark"
            class="absolute top-3 right-3 bg-white bg-opacity-30 hover:bg-opacity-90 p-2 rounded-full text-white"
          >
            <i class="far fa-bookmark"></i>
          </button>
          <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-[rgba(0,0,0,0.6)] to-transparent p-5 rounded-b-xl text-white"
          >
            <h2 class="text-xl font-semibold mb-1">Lorem ipsum</h2>
            <p class="text-sm mb-2 leading-snug">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
              nonummy
            </p>
            <div class="flex items-center text-xs mb-2 opacity-80">
              <i class="fas fa-map-marker-alt mr-1"></i>Arab Saudi
            </div>
            <div class="flex items-center justify-between">
              <span class="font-bold text-lg">Rp 5.000.000</span>
              <button
                class="bg-white bg-opacity-30 hover:bg-opacity-50 rounded-lg px-4 py-2 text-sm font-medium text-white"
              >
                View Details
              </button>
            </div>
            <div
              class="absolute top-5 right-5 flex items-center space-x-1 text-yellow-400 text-sm font-semibold"
            >
              <i class="fas fa-star"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
        <div
          class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90 transition-all duration-500"
        >
          <img
            alt="Eiffel Tower under clear blue sky"
            class="w-full h-full object-cover"
            src="assets/eifel.png"
            width="192"
            height="256"
          />
        </div>
        <div
          class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90 transition-all duration-500"
          style="width: 160px; height: 213px;"
        >
          <img
            alt="Japanese Torii gates in forest path"
            class="w-full h-full object-cover"
            src="assets/shrine.png"
            width="160"
            height="213"
          />
        </div>
      </div>
      <button
        id="nextBtn"
        class="absolute right-6 top-1/2 -translate-y-1/2 bg-orange-400 hover:bg-orange-500 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg"
        aria-label="Next"
      >
        <i class="fas fa-chevron-right text-2xl"></i>
      </button>
      <a
        class="absolute right-6 top-6 text-blue-500 font-medium hover:underline"
        href="#"
        >View All</a
      >
    </div>
  </section>
  <script src="{{ asset('js/home.js') }}" ></script>
  <style>
   .carousel-card {
     transition:
       transform 0s cubic-bezier(0.4,0,0.2,1),
       z-index 2s,
       width 0s cubic-bezier(0.4,0,0.2,1),
       height 0s cubic-bezier(0.4,0,0.2,1),
       opacity 0s cubic-bezier(0.4,0,0.2,1),
       filter 0s cubic-bezier(0.4,0,0.2,1),
       border-radius 0s cubic-bezier(0.4,0,0.2,1),
       box-shadow 0s cubic-bezier(0.4,0,0.2,1),
       border 0s cubic-bezier(0.4,0,0.2,1);
     will-change: transform, width, height, opacity, filter, border-radius, box-shadow, border;
     width: 640px;
     height: 852px;
     opacity: 1;
     filter: brightness(1);
     border-radius: 1.25rem;
   }
   .carousel-card.center {
     width: 320px !important;
     height: 426px !important;
     z-index: 10;
     transform: scale(0.85);
     opacity: 1;
     filter: brightness(1);
     border-radius: 2rem !important;
     box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 8px 0 rgba(255,140,0,0.10);
     border: 4px solid rgba(255,255,255,0.7);
   }
   .carousel-card.near-center {
     width: 192px !important;
     height: 256px !important;
     z-index: 5;
     transform: scale(1);
     opacity: 0.8;
     filter: brightness(0.9);
   }
   .carousel-card.far {
     width: 140px !important;
     height: 186px !important;
     z-index: 1;
     transform: scale(0.85);
     opacity: 0.5;
     filter: brightness(0.7);
   }
  </style>
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
  <!-- Floating popup (bottom-right) -->
  <div id="autoPopup" class="fixed bottom-6 right-9 w-72 bg-transparent rounded-lg shadow-lg overflow-hidden transform translate-y-6 opacity-0 pointer-events-none transition-all duration-300 z-50" style="display:none;">
    <div class="relative">
      <img src="assets/popup.png" alt="Promo" class="w-72 h-auto object-cover block" />
      <button id="popupClose" aria-label="Close popup" class="absolute top-2 right-2 bg-white bg-opacity-80 rounded-full p-1 shadow hover:bg-opacity-100">
        <i class="fas fa-times text-gray-700"></i>
      </button>
    </div>
  </div>

  <script>
    (function() {
      const popup = document.getElementById('autoPopup');
      const closeBtn = document.getElementById('popupClose');
      const INITIAL_DELAY = 1000;
      let reopenTimeout = null;

      function showPopup() {
        if (!popup) return;
        popup.classList.remove('popup-animate-out');
        popup.style.display = 'block';
        requestAnimationFrame(() => {
          popup.classList.remove('translate-y-6', 'opacity-0', 'pointer-events-none');
          popup.classList.add('translate-y-0', 'opacity-100', 'popup-animate-in');
        });
      }

      function hidePopup() {
        if (!popup) return;
        popup.classList.remove('popup-animate-in');
        popup.classList.add('popup-animate-out');
        popup.classList.add('translate-y-6', 'opacity-0', 'pointer-events-none');
        const handler = () => {
          popup.style.display = 'none';
          popup.classList.remove('popup-animate-out');
          popup.removeEventListener('animationend', handler);
        };
        popup.addEventListener('animationend', handler);
      }

      closeBtn?.addEventListener('click', function () {
        hidePopup();
        if (reopenTimeout) clearTimeout(reopenTimeout);
        reopenTimeout = setTimeout(showPopup, REAPPEAR_MS);
      });

      setTimeout(showPopup, INITIAL_DELAY);
    })();
  </script>
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