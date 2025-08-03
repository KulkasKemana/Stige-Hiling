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
      <li><a href="#" class="text-orange-500 border-b-2 border-orange-500">Home</a></li>
      <li><a href="#" class="hover:text-orange-500">Calendar</a></li>
      <li><a href="#" class="hover:text-orange-500">Best Destination</a></li>
    </ul>
  </div>
   <div class="flex items-center space-x-4 transform -translate-x-20">
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
  <button class="relative p-2.5 bg-white rounded-full shadow hover:bg-orange-50">
    <img src="assets/profile-icon.png" alt="Profil" class="w-5 h-5 object-contain" />
  </button>

  <button class="text-white hover:text-orange-400 -ml-2px">
    <i class="fas fa-chevron-down text-sm"></i>
  </button>
</div>
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
  width: 120px;
  height: 160px;
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
 </body>
</html> 