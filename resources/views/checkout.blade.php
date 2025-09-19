<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Checkout</title>
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
<!-- Cek -->
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Checkout
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-white">
  <!-- Replace the previous content wrapper -->
  <div class="min-h-[calc(100vh-80px)] flex items-center justify-center">
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center space-x-2 mb-8">
    <i class="fas fa-arrow-center text-lg">
    </i>
    <h1 class="font-semibold text-lg">
     Checkout
    </h1>
   </div>
   <div class="flex flex-col lg:flex-row gap-8">
    <!-- Left form container -->
    <form autocomplete="off" class="flex-1 border border-gray-300 rounded-xl p-6 max-w-lg w-full">
     <!-- Personal Identity -->
     <fieldset class="mb-8 border-0 p-0">
      <legend class="font-semibold text-sm mb-4 block">
       Personal Identity
      </legend>
      <div class="flex gap-6 mb-6">
       <div class="flex flex-col w-1/2">
        <label class="text-xs font-semibold mb-1" for="firstName">
         First Name
        </label>
        <input class="border border-gray-300 rounded-md text-xs px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-400" id="firstName" name="firstName" type="text"/>
       </div>
       <div class="flex flex-col w-1/2">
        <label class="text-xs font-semibold mb-1" for="lastName">
         Last Name
        </label>
        <input class="border border-gray-300 rounded-md text-xs px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-400" id="lastName" name="lastName" type="text"/>
       </div>
      </div>
      <div class="mb-6">
       <label class="text-xs font-semibold mb-1 block" for="address">
        Address
       </label>
       <input class="border border-gray-300 rounded-md text-xs px-3 py-2 w-full focus:outline-none focus:ring-1 focus:ring-orange-400" id="address" name="address" type="text"/>
      </div>
      <div>
       <label class="text-xs font-semibold mb-1 block" for="phone">
        Phone Number
       </label>
       <input class="border border-gray-300 rounded-md text-xs px-3 py-2 w-40 focus:outline-none focus:ring-1 focus:ring-orange-400" id="phone" name="phone" placeholder="0812345678" type="text"/>
      </div>
      <hr class="border-gray-300 my-8"/>
     </fieldset>
     <!-- Reservation -->
     <fieldset class="border-0 p-0">
      <legend class="font-semibold text-sm mb-4 block">
       Reservation
      </legend>
      <div class="flex gap-6 mb-6">
       <div class="flex flex-col w-1/2">
        <label class="text-xs font-semibold mb-1" for="checkIn">
         Check In
        </label>
        <div class="relative">
         <input class="border border-gray-300 rounded-md text-xs px-3 py-2 w-full pr-8 focus:outline-none focus:ring-1 focus:ring-orange-400" id="checkIn" name="checkIn" placeholder="Start Date" type="date"/>
         <i class="fas fa-calendar-alt absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none">
         </i>
       </div>
       </div>
       <div class="flex flex-col w-1/2">
        <label class="text-xs font-semibold mb-1" for="checkOut">
         Check Out
        </label>
        <div class="relative">
         <input class="border border-gray-300 rounded-md text-xs px-3 py-2 w-full pr-8 focus:outline-none focus:ring-1 focus:ring-orange-400" id="checkOut" name="checkOut" placeholder="End Date" type="date"/>
         <i class="fas fa-calendar-alt absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none">
         </i>
       </div>
       </div>
      </div>
      <div class="flex flex-col w-72">
       <label class="text-xs font-semibold mb-1" for="people">
        Number of People
       </label>
       <div class="border border-gray-300 rounded-md text-xs px-3 py-2 flex items-center gap-2 text-gray-500">
        <i class="fas fa-user text-gray-400 text-xs">
        </i>
        <input class="w-full bg-transparent focus:outline-none" id="people" name="people" placeholder="20 sd 50" type="text"/>
       </div>
       <span class="text-gray-300 text-xs mt-1">
        Maximum 50 Person
       </span>
      </div>
      <button class="mt-8 bg-orange-400 text-white text-xs font-semibold rounded-md px-8 py-2 w-36 self-start hover:bg-orange-500 transition" type="submit">
       Book Now
      </button>
     </fieldset>
    </form>
    <!-- Right side container -->
    <div class="flex-1 max-w-md w-full flex flex-col gap-6">
     <!-- Image card -->
     <div class="border border-gray-300 rounded-xl overflow-hidden">
      <img alt="Photo of Masjidil Haram mosque with blue sky background and minarets" class="w-full h-48 object-cover rounded-t-xl" height="300" src="https://storage.googleapis.com/a1aa/image/c0a614ed-217f-4b6e-e91d-a078e40cb0c1.jpg" width="600"/>
      <div class="p-4">
       <h2 class="font-semibold text-sm mb-1">
        Masjidil Haram
       </h2>
       <p class="text-xs text-gray-500 mb-2">
        Makkah, Saudi Arabia
       </p>
       <div class="flex items-center justify-between">
        <div class="flex items-center gap-1">
         <i class="fas fa-star text-yellow-400 text-xs">
         </i>
         <span class="text-xs font-semibold">
          4.75
         </span>
         <span class="text-xs text-gray-400 ml-1">
          108 Reviews
         </span>
        </div>
       </div>
       <div class="mt-3 flex items-center gap-2">
        <span class="text-orange-400 font-semibold text-lg">
         $200
        </span>
        <span class="text-xs text-gray-400 line-through">
         $230
        </span>
       </div>
      </div>
     </div>
     <!-- Booking Details -->
     <div class="w-full max-w-md rounded-2xl border border-gray-300 p-6 bg-white mx-auto">
  <h2 class="text-black text-xl font-semibold mb-4">Booking Details</h2>
  <hr class="border-gray-300 mb-4" />
  <div class="mb-6">
    <h3 class="text-sm font-semibold mb-2 text-black">Reservation Details</h3>
    <div class="flex justify-between mb-2 text-sm text-black">
      <span>Name</span>
      <span>: Robert Downey</span>
    </div>
    <div class="flex justify-between mb-2 text-sm text-black">
      <div class="flex items-center space-x-0.5">
        <i class="fas fa-calendar-alt text-orange-400"></i>
        <span>Start Date</span>
      </div>
      <span>: 20 July 2025</span>
      <div class="flex items-center space-x-0.5">
        <i class="fas fa-calendar-alt text-orange-400"></i>
        <span>End Date</span>
      </div>
      <span>: 30 July 2025</span>
    </div>
    <div class="text-sm text-black">Number of Person 30 Person</div>
  </div>
  <hr class="border-gray-300 mb-6" />
  <div>
    <h3 class="text-sm font-semibold mb-2 text-black">Payment Details</h3>
    <div class="flex justify-between mb-2 text-sm text-black">
      <span>Order Number</span>
      <span>: 0921 - 9289-6673</span>
    </div>
    <div class="flex justify-between mb-2 text-sm text-black">
      <span>Price</span>
      <span>: $230</span>
    </div>
    <div class="flex justify-between mb-2 text-sm text-black">
      <span>Discount</span>
      <span class="text-orange-400">: - $30</span>
    </div>
    <div class="flex justify-between mb-2 text-sm text-black">
      <span>Tax</span>
      <span>: $5</span>
    </div>
    <div class="flex justify-between items-end text-sm text-black font-semibold">
      <span>Total</span>
      <div class="flex flex-col items-end">
        <span>: <span class="font-bold">$205</span></span>
        <span class="text-xs font-normal text-gray-400 line-through mt-0.5">$230</span>
      </div>
    </div>
  </div>
</div>
    </div>
   </div>
    </div>
  </div>
  <script>
  const checkIn = document.getElementById('checkIn');
  const checkOut = document.getElementById('checkOut');
  const startDateDisplay = document.getElementById('startDateDisplay');
  const endDateDisplay = document.getElementById('endDateDisplay');

  checkIn.addEventListener('change', function() {
    const date = new Date(this.value);
    if (!isNaN(date)) {
      const options = { day: 'numeric', month: 'long', year: 'numeric' };
      startDateDisplay.textContent = ': ' + date.toLocaleDateString('en-US', options);
    }
  });

  checkOut.addEventListener('change', function() {
    const date = new Date(this.value);
    if (!isNaN(date)) {
      const options = { day: 'numeric', month: 'long', year: 'numeric' };
      endDateDisplay.textContent = ': ' + date.toLocaleDateString('en-US', options);
    }
  });

  // Update Booking Name dynamically
  const firstNameInput = document.getElementById('firstName');
  const lastNameInput = document.getElementById('lastName');
  const bookingName = document.getElementById('bookingName');

  function updateBookingName() {
    const fullName = (firstNameInput.value + ' ' + lastNameInput.value).trim();
    bookingName.textContent = ': ' + fullName;
  }

  firstNameInput.addEventListener('input', updateBookingName);
  lastNameInput.addEventListener('input', updateBookingName);
</script>
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