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

  </style>
 </head>
 <body class="bg-white">
  <!-- Navbar -->
  <nav class="sticky top-0 z-50 h-20 flex items-center justify-between px-8 bg-[#EDEDED] shadow-md">
  <div class="flex items-center gap-8">
    <div class="relative bg-white h-[80px] w-[240px] overflow-hidden shadow-md -ml-8 rounded-r-[50px]">
  <div class="relative z-10 flex items-center pl-4 h-full">
    <img src="assets/logo_healing_no_bg.png" class="h-10 w-auto mr-2" />
    <div class="text-left leading-tight">
      <h1 class="font-bold text-sm text-gray-800">Healing</h1>
      <p class="text-xs text-gray-500">Tour And Travel</p>
    </div>
  </div>
</div>
    <ul class="flex gap-6 font-Montserrat text-gray-700">
      <li><a href="#" class="text-orange-500 border-b-2 border-orange-500">Home</a></li>
      <li><a href="#" class="hover:text-orange-500">Calendar</a></li>
      <li><a href="#" class="hover:text-orange-500">Best Destination</a></li>
    </ul>
  </div>
   <div class="flex items-center space-x-4">
    <div class="relative">
    <input
      type="text"
      placeholder="Search..."
      class="pl-10 pr-4 py-2 rounded-full border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-400 text-sm sm:w-40 md:w-56"
    />
    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm"></i>
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
  <button class="relative p-2.5 bg-white rounded-full shadow hover:bg-orange-50">
    <img src="assets/profile-icon.png" alt="Profil" class="w-5 h-5 object-contain" />
  </button>
</div>
  </nav>
  <!-- Hero Section -->
  <section class="relative w-full h-[400px] sm:h-[480px] md:h-[520px] lg:h-[560px] xl:h-[600px]">
  <img 
    src="assets/homepage-img.png" 
    alt="Man wearing red jacket and green backpack standing on a rock overlooking a mountain valley at sunset" 
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
      <button class="bg-orange-400 hover:bg-orange-500 text-white text-sm sm:text-base font-Montserrat rounded-full px-6 py-2 flex items-center space-x-2">
        <span>Book Now</span>
        <i class="fas fa-arrow-right"></i>
      </button>

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
  <section class="mt-8 relative px-6 sm:px-12 md:px-20 lg:px-28 xl:px-36 overflow-x-auto scrollbar-hide">
   <div class="flex space-x-6">
    <!-- Left arrow -->
    <button aria-label="Scroll left" class="flex items-center justify-center w-10 h-10 rounded-full bg-orange-400 text-white shrink-0">
     <i class="fas fa-chevron-left">
     </i>
    </button>
    <!-- Cards -->
    <div class="flex space-x-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-pl-6" style="scroll-behavior: smooth;">
     <!-- Card 1 -->
     <div class="snap-center flex-shrink-0 w-48 sm:w-56 md:w-64 rounded-xl overflow-hidden relative">
      <img alt="Beach with deck chairs and umbrella on sandy shore with blue sky and ocean" class="w-full h-full object-cover" height="320" src="https://storage.googleapis.com/a1aa/image/b1072067-50f1-426b-41e0-e982427d7c17.jpg" width="256"/>
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent p-3 flex flex-col justify-end text-white text-xs sm:text-sm">
       <div class="font-semibold">
        Lorem ipsum
       </div>
       <div class="line-clamp-2">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
              nonummy
       </div>
       <div class="flex items-center space-x-1 mt-1">
        <i class="fas fa-map-marker-alt text-orange-400 text-xs">
        </i>
        <span>
         Beach
        </span>
       </div>
       <div class="mt-1 font-semibold">
        Rp 1.000.000
       </div>
      </div>
     </div>
     <!-- Card 2 -->
     <div class="snap-center flex-shrink-0 w-48 sm:w-56 md:w-64 rounded-xl overflow-hidden relative">
      <img alt="Off-road vehicle parked in forest area with green trees and blue sky" class="w-full h-full object-cover" height="320" src="https://storage.googleapis.com/a1aa/image/695e5801-9e5d-4a11-a9ab-df55120fe6b7.jpg" width="256"/>
     </div>
     <!-- Card 3 (highlighted) -->
     <div class="snap-center flex-shrink-0 w-48 sm:w-56 md:w-64 rounded-xl overflow-hidden relative bg-gradient-to-t from-black/60 to-transparent">
      <img alt="Large mosque with minaret under clear blue sky" class="w-full h-full object-cover rounded-xl" height="320" src="https://storage.googleapis.com/a1aa/image/a1ac9d06-dee1-4ce3-c23c-d122c013c04b.jpg" width="256"/>
      <div class="absolute top-3 right-3 bg-white bg-opacity-30 rounded-full p-1 cursor-pointer" title="Bookmark">
       <i class="fas fa-bookmark text-white">
       </i>
      </div>
      <div class="absolute bottom-3 left-3 right-3 text-white text-xs sm:text-sm">
       <div class="font-semibold">
        Lorem ipsum
       </div>
       <div class="line-clamp-2">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
              nonummy
       </div>
       <div class="flex items-center space-x-1 mt-1 text-yellow-400">
        <i class="fas fa-star">
        </i>
        <span>
         5.0
        </span>
       </div>
       <div class="flex items-center space-x-1 mt-1 text-white text-xs">
        <i class="fas fa-map-marker-alt">
        </i>
        <span>
         Arab Saudi
        </span>
       </div>
       <div class="mt-2 bg-white bg-opacity-30 rounded-full px-3 py-1 text-xs font-semibold inline-block">
        View Details
       </div>
       <div class="mt-1 font-semibold">
        Rp 5.000.000
       </div>
      </div>
     </div>
     <!-- Card 4 -->
     <div class="snap-center flex-shrink-0 w-48 sm:w-56 md:w-64 rounded-xl overflow-hidden relative">
      <img alt="Eiffel Tower under clear blue sky" class="w-full h-full object-cover" height="320" src="https://storage.googleapis.com/a1aa/image/123a18c5-5905-442e-6fad-c345b2c778fe.jpg" width="256"/>
     </div>
     <!-- Card 5 -->
     <div class="snap-center flex-shrink-0 w-48 sm:w-56 md:w-64 rounded-xl overflow-hidden relative">
      <img alt="Traditional Japanese torii gate in forest with green trees" class="w-full h-full object-cover" height="320" src="https://storage.googleapis.com/a1aa/image/71abb561-24bd-4d12-5150-66657eeb9016.jpg" width="256"/>
     </div>
    </div>
    <!-- Right arrow -->
    <button aria-label="Scroll right" class="flex items-center justify-center w-10 h-10 rounded-full bg-orange-400 text-white shrink-0">
     <i class="fas fa-chevron-right">
     </i>
    </button>
   </div>
   <div class="text-right mt-2 text-xs text-blue-600 font-semibold cursor-pointer select-none">
    View All
   </div>
  </section>
 </body>
</html> 