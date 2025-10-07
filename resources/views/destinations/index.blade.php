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
          
          @auth
            <button class="bookmark-btn absolute top-3 right-3 bg-white bg-opacity-30 hover:bg-opacity-90 p-2 rounded-full transition"
                    data-destination-id="{{ $destination->id }}"
                    onclick="toggleBookmark({{ $destination->id }}, this)">
              <i class="far fa-bookmark text-white"></i>
            </button>
          @else
            <a href="{{ route('login') }}" 
               class="absolute top-3 right-3 bg-white bg-opacity-30 hover:bg-opacity-90 p-2 rounded-full transition">
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