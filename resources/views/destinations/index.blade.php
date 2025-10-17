<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Destinations - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
    }
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
    .bookmark-btn {
      transition: all 0.3s ease;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .bookmark-btn:hover {
      transform: scale(1.1);
    }
    .bookmark-btn.bookmarked i {
      color: #ff914d;
    }
  </style>
</head>
<body class="bg-white pt-20">
  
  {{-- Include Navbar --}}
  @include('partials.navbar')

  <!-- Hero Section with Search -->
  <section class="relative w-full h-[500px] bg-cover bg-center" style="background-image: url('{{ asset('assets/banner.png') }}');">
    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/40"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full px-4">
      <!-- Hero Text -->
      <div class="text-center mb-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg">
          Discover Your Next Adventure
        </h1>
        <p class="text-lg md:text-xl text-white/90 drop-shadow-md">
          Find the perfect destination for your dream vacation
        </p>
      </div>

      <!-- Search Box -->
      <div class="w-full max-w-5xl">
        <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-8">
          <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <!-- Search Bar for Destination -->
            <div class="md:col-span-5">
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-map-marker-alt text-orange-500 mr-1"></i>
                Where to?
              </label>
              <div class="relative">
                <input 
                  type="text" 
                  id="destinationSearch"
                  placeholder="Search destination..." 
                  class="w-full px-4 py-3 pl-11 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                >
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
              </div>
            </div>
            
            <!-- Type Dropdown -->
            <div class="md:col-span-3">
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-tag text-orange-500 mr-1"></i>
                Type
              </label>
              <select id="typeFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition appearance-none bg-white">
                <option value="">All Types</option>
                <option value="cultural">Cultural</option>
                <option value="nature">Nature</option>
                <option value="city">City Tour</option>
                <option value="adventure">Adventure</option>
              </select>
            </div>
            
            <!-- Duration Dropdown -->
            <div class="md:col-span-2">
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-clock text-orange-500 mr-1"></i>
                Duration
              </label>
              <select id="durationFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition appearance-none bg-white">
                <option value="">Any</option>
                <option value="1-3">1-3 days</option>
                <option value="4-7">4-7 days</option>
                <option value="8-14">8-14 days</option>
                <option value="15+">15+ days</option>
              </select>
            </div>
            
            <!-- Search Button -->
            <div class="md:col-span-2 flex items-end">
              <button onclick="applyFilters()" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200">
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
          
          @auth
          <button class="bookmark-btn absolute top-3 right-3 bg-white bg-opacity-30 hover:bg-opacity-90 transition"
                  data-destination-id="{{ $destination->id }}"
                  onclick="toggleBookmark({{ $destination->id }}, this)">
            <i class="far fa-bookmark text-white"></i>
          </button>
        @else
          <a href="{{ route('login') }}?redirect={{ urlencode(request()->fullUrl()) }}" 
            class="bookmark-btn absolute top-3 right-3 bg-white bg-opacity-30 hover:bg-opacity-90 transition"
            title="Login to bookmark this destination">
            <i class="far fa-bookmark text-white"></i>
          </a>
        @endauth
          
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

  {{-- Include Footer --}}
  @include('partials.footer')

  <script>
    // Setup CSRF token for AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // Apply filters function
    function applyFilters() {
      const searchTerm = document.getElementById('destinationSearch').value.toLowerCase();
      const typeFilter = document.getElementById('typeFilter').value.toLowerCase();
      const durationFilter = document.getElementById('durationFilter').value;
      const cards = document.querySelectorAll('.destination-card');
      
      cards.forEach(card => {
        const name = card.querySelector('h3').textContent.toLowerCase();
        const location = card.querySelector('.fa-map-marker-alt').parentElement.textContent.toLowerCase();
        const description = card.querySelector('.line-clamp-2').textContent.toLowerCase();
        const duration = card.querySelector('.fa-clock').parentElement.textContent.trim();
        
        // Check search term
        const matchesSearch = !searchTerm || 
                            name.includes(searchTerm) || 
                            location.includes(searchTerm) || 
                            description.includes(searchTerm);
        
        // Check duration filter
        let matchesDuration = !durationFilter;
        if (durationFilter && duration) {
          if (durationFilter === '1-3' && (duration.includes('1') || duration.includes('2') || duration.includes('3'))) {
            matchesDuration = true;
          } else if (durationFilter === '4-7' && (duration.includes('4') || duration.includes('5') || duration.includes('6') || duration.includes('7'))) {
            matchesDuration = true;
          } else if (durationFilter === '8-14') {
            const days = parseInt(duration.match(/\d+/));
            matchesDuration = days >= 8 && days <= 14;
          } else if (durationFilter === '15+') {
            const days = parseInt(duration.match(/\d+/));
            matchesDuration = days >= 15;
          }
        }
        
        // Show/hide card based on all filters
        if (matchesSearch && matchesDuration) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    // Real-time search as user types
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('destinationSearch');
      if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
      }
      
      const typeFilter = document.getElementById('typeFilter');
      if (typeFilter) {
        typeFilter.addEventListener('change', applyFilters);
      }
      
      const durationFilter = document.getElementById('durationFilter');
      if (durationFilter) {
        durationFilter.addEventListener('change', applyFilters);
      }
    });

    // Filter destinations function
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

    // Toggle bookmark function
    async function toggleBookmark(destinationId, button) {
      try {
        const response = await fetch(`/bookmark/toggle/${destinationId}`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          }
        });

        const data = await response.json();
        
        if (data.success) {
          const icon = button.querySelector('i');
          if (data.bookmarked) {
            icon.classList.remove('far');
            icon.classList.add('fas');
            button.classList.add('bookmarked');
            showNotification('Added to bookmarks!', 'success');
          } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
            button.classList.remove('bookmarked');
            showNotification('Removed from bookmarks!', 'info');
          }
        }
      } catch (error) {
        console.error('Error:', error);
        showNotification('Something went wrong!', 'error');
      }
    }

    // Show notification
    function showNotification(message, type) {
      const notification = document.createElement('div');
      notification.className = `fixed top-24 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white ${
        type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500'
      }`;
      notification.textContent = message;
      document.body.appendChild(notification);
      
      setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s ease';
        setTimeout(() => notification.remove(), 300);
      }, 3000);
    }

    // Check bookmark status on page load
    document.addEventListener('DOMContentLoaded', async function() {
      const bookmarkButtons = document.querySelectorAll('.bookmark-btn');
      
      for (const button of bookmarkButtons) {
        const destinationId = button.dataset.destinationId;
        try {
          const response = await fetch(`/bookmark/check/${destinationId}`);
          const data = await response.json();
          
          if (data.bookmarked) {
            const icon = button.querySelector('i');
            icon.classList.remove('far');
            icon.classList.add('fas');
            button.classList.add('bookmarked');
          }
        } catch (error) {
          console.error('Error checking bookmark:', error);
        }
      }
    });
  </script>
</body>
</html>