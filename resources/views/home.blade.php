<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Home - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
    
    @font-face {
      font-family: "Callisten";
      src: url("{{ asset('fonts/callisten.ttf') }}") format("truetype");
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
      transition: transform 0.5s cubic-bezier(0.4,0,0.2,1), 
                  width 0.5s cubic-bezier(0.4,0,0.2,1),
                  height 0.5s cubic-bezier(0.4,0,0.2,1),
                  opacity 0.5s cubic-bezier(0.4,0,0.2,1),
                  filter 0.5s cubic-bezier(0.4,0,0.2,1);
      will-change: transform, width, height, opacity, filter;
      width: 160px;
      height: 213px;
      opacity: 0.5;
      filter: brightness(0.7);
      border-radius: 1rem;
    }
    
    .carousel-card.center {
      width: 320px !important;
      height: 426px !important;
      z-index: 10;
      opacity: 1;
      filter: brightness(1);
      border-radius: 1.5rem !important;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18), 0 2px 8px rgba(255,140,0,0.10);
    }
    
    .carousel-card.near-center {
      width: 192px !important;
      height: 256px !important;
      z-index: 5;
      opacity: 0.8;
      filter: brightness(0.9);
    }
  </style>
</head>
<body class="bg-white pt-20">
  
  {{-- Include Navbar --}}
  @include('partials.navbar')

  <!-- Hero Section -->
  <section class="relative w-full h-[400px] sm:h-[480px] md:h-[520px] lg:h-[560px] xl:h-[600px]">
    <img src="{{ asset('assets/homepage-img.png') }}" 
        class="w-full h-full object-cover" 
        alt="Healing Tour Hero"/>
    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center px-6 sm:px-12 md:px-20 lg:px-28 xl:px-36">
      <h1 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl max-w-lg leading-tight">
        Explore the<br/>
        Beautiful <span class="text-orange-400 italic" style="font-family: 'Callisten'">World!</span>
      </h1>
      <div class="mt-8 flex space-x-4">
        <a href="{{ route('destinations.index') }}" 
          class="border border-white text-white text-sm sm:text-base rounded-full px-6 py-2 flex items-center space-x-2 hover:bg-white hover:text-orange-400 transition">
          <span>Explore Tours</span>
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Best Destinations Title -->
  <section id="destinations" class="text-center py-16 px-6">
    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
      Best Destinations
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
      Discover the world's most breathtaking locations with our carefully curated travel packages designed to create unforgettable experiences
    </p>
  </section>

  <!-- Carousel Section -->
  <section class="py-16 bg-gradient-to-r from-gray-50 via-white to-gray-50">
    <div class="max-w-7xl mx-auto px-6">
      <div class="relative flex items-center justify-center">
        
        <!-- Previous Button -->
        <button id="prevBtn" 
                aria-label="Previous" 
                class="absolute left-0 z-20 bg-orange-500 hover:bg-orange-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition">
          <i class="fas fa-chevron-left text-xl"></i>
        </button>

        <!-- Carousel Container -->
        <div id="carouselItems" 
             class="flex gap-6 overflow-hidden items-center justify-center"
             style="max-width: 900px;">
          
          <div class="carousel-card relative overflow-hidden flex-shrink-0">
            <img alt="Beach relaxation" 
                 class="w-full h-full object-cover" 
                 src="{{ asset('assets/chill.png') }}"/>
          </div>
          
          <div class="carousel-card relative overflow-hidden flex-shrink-0">
            <img alt="Adventure jeep" 
                 class="w-full h-full object-cover" 
                 src="{{ asset('assets/jeep.png') }}"/>
          </div>
          
          <div class="carousel-card relative overflow-hidden flex-shrink-0">
            <img alt="Masjid Nabawi" 
                 class="w-full h-full object-cover" 
                 src="{{ asset('assets/masjid.png') }}"/>
          </div>
          
          <div class="carousel-card relative overflow-hidden flex-shrink-0">
            <img alt="Eiffel Tower" 
                 class="w-full h-full object-cover" 
                 src="{{ asset('assets/eifel.png') }}"/>
          </div>
          
          <div class="carousel-card relative overflow-hidden flex-shrink-0">
            <img alt="Japanese shrine" 
                 class="w-full h-full object-cover" 
                 src="{{ asset('assets/shrine.png') }}"/>
          </div>
        </div>

        <!-- Next Button -->
        <button id="nextBtn" 
                aria-label="Next"
                class="absolute right-0 z-20 bg-orange-500 hover:bg-orange-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition">
          <i class="fas fa-chevron-right text-xl"></i>
        </button>
      </div>

      <!-- View All Link -->
      <div class="text-center mt-8">
        <a href="{{ route('destinations.index') }}" 
           class="inline-flex items-center gap-2 text-orange-500 hover:text-orange-600 font-medium transition">
          View All Destinations
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

  {{-- Include Footer --}}
  @include('partials.footer')

  <!-- Promo Popup -->
  <div id="autoPopup" 
       class="fixed bottom-6 right-6 w-72 bg-white rounded-2xl shadow-2xl overflow-hidden transform translate-y-6 opacity-0 pointer-events-none transition-all duration-300 z-50" 
       style="display:none;">
    <div class="relative">
      <img src="{{ asset('assets/popup.png') }}" 
           alt="Special Promo" 
           class="w-full h-auto object-cover"/>
      <button id="popupClose" 
              aria-label="Close popup"
              class="absolute top-3 right-3 bg-white/90 hover:bg-white rounded-full p-2 shadow-lg transition">
        <i class="fas fa-times text-gray-700"></i>
      </button>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/home.js') }}"></script>
  
  <script>
    // Popup functionality
    (function() {
      const popup = document.getElementById('autoPopup');
      const closeBtn = document.getElementById('popupClose');
      const INITIAL_DELAY = 3000;

      function showPopup() {
        if (!popup) return;
        popup.style.display = 'block';
        requestAnimationFrame(() => {
          popup.classList.remove('translate-y-6', 'opacity-0', 'pointer-events-none');
          popup.classList.add('popup-animate-in');
        });
      }

      function hidePopup() {
        if (!popup) return;
        popup.classList.add('popup-animate-out', 'translate-y-6', 'opacity-0', 'pointer-events-none');
        setTimeout(() => {
          popup.style.display = 'none';
          popup.classList.remove('popup-animate-out');
        }, 300);
      }

      closeBtn?.addEventListener('click', hidePopup);
      setTimeout(showPopup, INITIAL_DELAY);
    })();
  </script>
</body>
</html>