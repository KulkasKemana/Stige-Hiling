<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Destinations - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
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
    #arrowButton.rotate { transform: rotate(180deg); }
    #arrowButton i {
      display: inline-block;
      transition: transform 220ms cubic-bezier(.2,.9,.2,1);
      transform: rotate(0deg);
      transform-origin: center;
    }
    #arrowButton.rotate i { transform: rotate(180deg); }
    .tab-active {
      background-color: #ff914d;
      color: white;
    }
    .tab-inactive {
      background-color: #f3f4f6;
      color: #374151;
    }
    .tab-inactive:hover {
      background-color: #e5e7eb;
    }
  </style>
</head>
<body class="bg-white pt-16">
  <!-- Navbar -->
  @include('partials.navbar')

  <!-- Hero Section with Search -->
  <section class="relative w-full h-96 bg-cover bg-center" style="background-image: url('{{ asset('assets/banner.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="relative z-10 flex items-center justify-center h-full px-4">
      <div class="w-full max-w-4xl">
        <div class="bg-white rounded-lg shadow-lg p-6">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-2">Destination</label>
              <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                <option value="">Select destination</option>
                @foreach($destinations as $dest)
                  <option value="{{ $dest->id }}">{{ $dest->name }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="md:col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
              <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                <option value="">Select type</option>
                <option value="cultural">Cultural</option>
                <option value="nature">Nature</option>
                <option value="city">City Tour</option>
                <option value="adventure">Adventure</option>
              </select>
            </div>
            
            <div class="md:col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
              <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                <option value="">Select duration</option>
                <option value="1-3">1-3 days</option>
                <option value="4-7">4-7 days</option>
                <option value="8-14">8-14 days</option>
                <option value="15+">15+ days</option>
              </select>
            </div>
            
            <div class="md:col-span-1 flex items-end">
              <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                <i class="fas fa-search mr-2"></i>Search
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Filter Tabs -->
  <section class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-wrap gap-2 justify-center mb-8">
      <button class="tab-active px-6 py-2 rounded-full font-medium transition duration-200" onclick="filterDestinations('all')">
        All
      </button>
      <button class="tab-inactive px-6 py-2 rounded-full font-medium transition duration-200" onclick="filterDestinations('Religious')">
        Religious
      </button>
      <button class="tab-inactive px-6 py-2 rounded-full font-medium transition duration-200" onclick="filterDestinations('Cultural')">
        Cultural
      </button>
      <button class="tab-inactive px-6 py-2 rounded-full font-medium transition duration-200" onclick="filterDestinations('Beach')">
        Beach
      </button>
      <button class="tab-inactive px-6 py-2 rounded-full font-medium transition duration-200" onclick="filterDestinations('Adventure')">
        Adventure
      </button>
    </div>

    <!-- Destinations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($destinations as $destination)
      <div class="destination-card bg-white rounded-2xl overflow-hidden shadow-lg" data-category="{{ $destination->category }}">
        <div class="relative">
          <img src="{{ asset($destination->image) }}" 
               alt="{{ $destination->name }}" 
               class="w-full h-48 object-cover">
          <button class="absolute top-3 right-3 bg-white bg-opacity-30 hover:bg-opacity-90 p-2 rounded-full transition">
            <i class="far fa-bookmark text-white"></i>
          </button>
          <div class="absolute top-3 left-3 bg-yellow-400 text-white px-2 py-1 rounded-full text-xs font-semibold">
            <i class="fas fa-star"></i> {{ $destination->rating }}
          </div>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">{{ $destination->name }}</h3>
          <p class="text-xs text-gray-500 mb-2">
            <i class="fas fa-map-marker-alt mr-1"></i>{{ $destination->location }}
          </p>
          <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $destination->description }}</p>
          <p class="text-sm font-bold text-orange-500 mb-3">Rp {{ number_format($destination->price, 0, ',', '.') }}</p>
          <div class="flex items-center text-xs text-gray-500 mb-3">
            <i class="far fa-clock mr-1"></i>
            <span>{{ $destination->duration }}</span>
          </div>
          <a href="{{ route('destinations.show', $destination->id) }}" 
             class="block text-center bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition duration-200">
            View Details
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
      @empty
      <div class="col-span-3 text-center py-12">
        <i class="fas fa-map-marked-alt text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">No destinations available</p>
      </div>
      @endforelse
    </div>
  </section>

  <!-- Footer -->
  @include('partials.footer')

  <script>
    function filterDestinations(category) {
      const cards = document.querySelectorAll('.destination-card');
      const tabs = document.querySelectorAll('button[onclick^="filterDestinations"]');
      
      tabs.forEach(tab => {
        if (tab.onclick.toString().includes(category)) {
          tab.className = 'tab-active px-6 py-2 rounded-full font-medium transition duration-200';
        } else {
          tab.className = 'tab-inactive px-6 py-2 rounded-full font-medium transition duration-200';
        }
      });
      
      cards.forEach(card => {
        const cardCategory = card.dataset.category;
        if (category === 'all' || cardCategory === category) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    document.addEventListener('DOMContentLoaded', function() {
      const heartButtons = document.querySelectorAll('.fa-bookmark');
      
      heartButtons.forEach(button => {
        button.parentElement.addEventListener('click', function(e) {
          e.preventDefault();
          if (button.classList.contains('far')) {
            button.classList.remove('far');
            button.classList.add('fas');
            button.style.color = '#ff914d';
          } else {
            button.classList.remove('fas');
            button.classList.add('far');
            button.style.color = '';
          }
        });
      });
    });
  </script>
</body>
</html>