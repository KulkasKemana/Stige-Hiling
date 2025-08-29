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
  <!-- Navbar remains unchanged -->
  <nav class="sticky top-0 z-50 h-20 flex items-center justify-between px-8 bg-[#EDEDED]">
  <div class="flex items-center gap-8">
    <div class="relative w-[340px] h-[130px] rounded-md">
      
      <img src="assets/logobg.png"
     alt="logo bg"
     class="absolute top-4 -left-10 w-[500px] h-[102px] object-cover z-0" />
      
  </div>
</div>
    <ul class="flex gap-6 font-Montserrat text-gray-700 -ml-20">
      <li><a href="/home" class="hover:text-orange-500">Home</a></li>
      <li><a href="#" class="hover:text-orange-500">Calendar</a></li>
      <li><a href="#" class="hover:text-orange-500">Destination</a></li>
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
      <a class="flex items-center justify-between px-6 text-gray-900" href="/profile"> 
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
      <div class="flex items-center space-x-1">
        <i class="fas fa-calendar-alt text-orange-400"></i>
        <span>Start Date</span>
      </div>
      <span>: 20 July 2025</span>
      <div class="flex items-center space-x-1">
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
 </body>
</html>