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
    <a href="/home" class="hover:underline transition-colors">Home</a>
    <a href="#" class="hover:underline transition-colors">Schedule</a>
    <a href="/destinations" class="hover:underline transition-colors">Destinations</a>
  </nav>

  <!-- Right: User info -->
  <div class="flex items-center gap-3">
    <button id="profileButton" class="flex items-center gap-3 bg-transparent p-0 focus:outline-none">
      <img src="assets/Profile-Icon.png" class="w-8 h-8 rounded-full object-cover" width="32" height="32" />
      <div class="min-w-[120px] text-right">
        <div class="text-sm font-semibold">StigeHealing</div>
        <div class="text-xs text-gray-500">stigehealing@gmail.com</div>
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
<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-20">
   <h1 class="text-4xl font-semibold text-gray-900 mb-8">
    Bookmarked List
   </h1>
   <section class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-10">
    <!-- Flutter style card repeated 8 times -->
    <article class="flex space-x-6">
     <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" src="assets/Bookmark.png"/>
     <div class="flex flex-col justify-between">
      <div>
       <h2 class="font-semibold text-sm mb-1">
        Beijing - China
       </h2>
       <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
       </p>
       <p class="text-xs font-normal mb-1">
        Rp 3.000.000/Person
       </p>
       <div class="flex items-center space-x-1 text-xs mb-3">
        <div class="flex items-center space-x-0.5 text-yellow-400">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star-half-alt">
         </i>
        </div>
        <span class="text-gray-900 font-semibold">
         4.3
        </span>
        <span class="text-gray-500 flex items-center space-x-1">
         <i class="fas fa-user">
         </i>
         <span>
          7K
         </span>
        </span>
       </div>
      </div>
      <button class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 w-max hover:bg-[#ff7e21] transition">
        Book Now
      </button>
     </div>
    </article>
    <article class="flex space-x-6">
     <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" src="assets/Bookmark.png"/>
     <div class="flex flex-col justify-between">
      <div>
       <h2 class="font-semibold text-sm mb-1">
        Beijing - China
       </h2>
       <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
       </p>
       <p class="text-xs font-normal mb-1">
        Rp 3.000.000/Person
       </p>
       <div class="flex items-center space-x-1 text-xs mb-3">
        <div class="flex items-center space-x-0.5 text-yellow-400">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star-half-alt">
         </i>
        </div>
        <span class="text-gray-900 font-semibold">
         4.3
        </span>
        <span class="text-gray-500 flex items-center space-x-1">
         <i class="fas fa-user">
         </i>
         <span>
          7K
         </span>
        </span>
       </div>
      </div>
      <button class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 w-max hover:bg-[#ff7e21] transition">
        Book Now
      </button>
     </div>
    </article>
    <article class="flex space-x-6">
     <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" src="assets/Bookmark.png"/>
     <div class="flex flex-col justify-between">
      <div>
       <h2 class="font-semibold text-sm mb-1">
        Beijing - China
       </h2>
       <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
       </p>
       <p class="text-xs font-normal mb-1">
        Rp 3.000.000/Person
       </p>
       <div class="flex items-center space-x-1 text-xs mb-3">
        <div class="flex items-center space-x-0.5 text-yellow-400">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star-half-alt">
         </i>
        </div>
        <span class="text-gray-900 font-semibold">
         4.3
        </span>
        <span class="text-gray-500 flex items-center space-x-1">
         <i class="fas fa-user">
         </i>
         <span>
          7K
         </span>
        </span>
       </div>
      </div>
      <button class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 w-max hover:bg-[#ff7e21] transition">
        Book Now
      </button>
     </div>
    </article>
    <article class="flex space-x-6">
     <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" src="assets/Bookmark.png"/>
     <div class="flex flex-col justify-between">
      <div>
       <h2 class="font-semibold text-sm mb-1">
        Beijing - China
       </h2>
       <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
       </p>
       <p class="text-xs font-normal mb-1">
        Rp 3.000.000/Person
       </p>
       <div class="flex items-center space-x-1 text-xs mb-3">
        <div class="flex items-center space-x-0.5 text-yellow-400">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star-half-alt">
         </i>
        </div>
        <span class="text-gray-900 font-semibold">
         4.3
        </span>
        <span class="text-gray-500 flex items-center space-x-1">
         <i class="fas fa-user">
         </i>
         <span>
          7K
         </span>
        </span>
       </div>
      </div>
      <button class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 w-max hover:bg-[#ff7e21] transition">
        Book Now
      </button>
     </div>
    </article>
    <article class="flex space-x-6">
     <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" src="assets/Bookmark.png"/>
     <div class="flex flex-col justify-between">
      <div>
       <h2 class="font-semibold text-sm mb-1">
        Beijing - China
       </h2>
       <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
       </p>
       <p class="text-xs font-normal mb-1">
        Rp 3.000.000/Person
       </p>
       <div class="flex items-center space-x-1 text-xs mb-3">
        <div class="flex items-center space-x-0.5 text-yellow-400">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star-half-alt">
         </i>
        </div>
        <span class="text-gray-900 font-semibold">
         4.3
        </span>
        <span class="text-gray-500 flex items-center space-x-1">
         <i class="fas fa-user">
         </i>
         <span>
          7K
         </span>
        </span>
       </div>
      </div>
      <button class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 w-max hover:bg-[#ff7e21] transition">
        Book Now
      </button>
     </div>
    </article>
    <article class="flex space-x-6">
     <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" src="assets/Bookmark.png"/>
     <div class="flex flex-col justify-between">
      <div>
       <h2 class="font-semibold text-sm mb-1">
        Beijing - China
       </h2>
       <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
       </p>
       <p class="text-xs font-normal mb-1">
        Rp 3.000.000/Person
       </p>
       <div class="flex items-center space-x-1 text-xs mb-3">
        <div class="flex items-center space-x-0.5 text-yellow-400">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star-half-alt">
         </i>
        </div>
        <span class="text-gray-900 font-semibold">
         4.3
        </span>
        <span class="text-gray-500 flex items-center space-x-1">
         <i class="fas fa-user">
         </i>
         <span>
          7K
         </span>
        </span>
       </div>
      </div>
      <button class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 w-max hover:bg-[#ff7e21] transition">
        Book Now
      </button>
     </div>
    </article>
    <article class="flex space-x-6">
     <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" src="assets/Bookmark.png"/>
     <div class="flex flex-col justify-between">
      <div>
       <h2 class="font-semibold text-sm mb-1">
        Beijing - China
       </h2>
       <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
       </p>
       <p class="text-xs font-normal mb-1">
        Rp 3.000.000/Person
       </p>
       <div class="flex items-center space-x-1 text-xs mb-3">
        <div class="flex items-center space-x-0.5 text-yellow-400">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star-half-alt">
         </i>
        </div>
        <span class="text-gray-900 font-semibold">
         4.3
        </span>
        <span class="text-gray-500 flex items-center space-x-1">
         <i class="fas fa-user">
         </i>
         <span>
          7K
         </span>
        </span>
       </div>
      </div>
      <button class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 w-max hover:bg-[#ff7e21] transition">
      Book Now
      </button>
     </div>
    </article>
   </section>
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