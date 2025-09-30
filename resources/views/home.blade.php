<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Home - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
    }
    @font-face {
      font-family: "Callisten";
      src: url("fonts/callisten.ttf") format("truetype");
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
    
    .carousel-card {
      transition: transform 0s cubic-bezier(0.4,0,0.2,1), z-index 2s, width 0s, height 0s, opacity 0s, filter 0s;
      will-change: transform, width, height, opacity, filter;
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
</head>
<body class="bg-white pt-16">
  
  {{-- Include Navbar --}}
  @include('partials.navbar')

  <!-- Hero Section -->
  <section class="relative w-full h-[400px] sm:h-[480px] md:h-[520px] lg:h-[560px] xl:h-[600px]">
    <img src="assets/homepage-img.png" class="w-full h-full object-cover" width="1440" height="600"/>
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
    <h2 class="font-extrabold text-3xl sm:text-4xl mb-2">Best Destinations</h2>
    <p class="text-xs sm:text-sm font-semibold text-gray-900 max-w-2xl mx-auto">
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna a
    </p>
  </section>

  <!-- Carousel Section -->
  <section id="carousel" class="mt-20 relative bg-gradient-to-r from-white via-gray-100 to-white py-16 overflow-visible">
    <div class="max-w-7xl mx-auto px-4 relative flex items-center justify-center">
      <button id="prevBtn" aria-label="Previous" class="z-20 absolute left-6 top-1/2 -translate-y-1/2 bg-orange-400 hover:bg-orange-500 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
        <i class="fas fa-chevron-left text-2xl"></i>
      </button>
      
      <div id="carouselItems" class="flex space-x-6 overflow-hidden max-w-5xl items-center justify-center">
        <!-- Carousel items here -->
        <div class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90">
          <img alt="Beach" class="w-full h-full object-cover" src="assets/chill.png"/>
        </div>
        <div class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90">
          <img alt="Jeep" class="w-full h-full object-cover" src="assets/jeep.png"/>
        </div>
        <div class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0">
          <img alt="Mosque" class="w-full h-full object-cover" src="assets/masjid.png"/>
        </div>
        <div class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90">
          <img alt="Eiffel" class="w-full h-full object-cover" src="assets/eifel.png"/>
        </div>
        <div class="carousel-card relative rounded-xl overflow-hidden flex-shrink-0 opacity-90">
          <img alt="Shrine" class="w-full h-full object-cover" src="assets/shrine.png"/>
        </div>
      </div>
      
      <button id="nextBtn" class="absolute right-6 top-1/2 -translate-y-1/2 bg-orange-400 hover:bg-orange-500 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
        <i class="fas fa-chevron-right text-2xl"></i>
      </button>
      <a class="absolute right-6 top-6 text-blue-500 font-medium hover:underline" href="#">View All</a>
    </div>
  </section>

  {{-- Include Footer --}}
  @include('partials.footer')

  <!-- Popup -->
  <div id="autoPopup" class="fixed bottom-6 right-9 w-72 bg-transparent rounded-lg shadow-lg overflow-hidden transform translate-y-6 opacity-0 pointer-events-none transition-all duration-300 z-50" style="display:none;">
    <div class="relative">
      <img src="assets/popup.png" alt="Promo" class="w-72 h-auto object-cover block" />
      <button id="popupClose" class="absolute top-2 right-2 bg-white bg-opacity-80 rounded-full p-1 shadow hover:bg-opacity-100">
        <i class="fas fa-times text-gray-700"></i>
      </button>
    </div>
  </div>

  <script src="{{ asset('js/home.js') }}"></script>
  <script>
  </script>
</body>
</html>