<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bookmarked - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
</head>
<body class="bg-white pt-20">
  
  {{-- Include Navbar --}}
  @include('partials.navbar')

  <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-20">
    <h1 class="text-4xl font-semibold text-gray-900 mb-8">Bookmarked List</h1>
    
    @if($bookmarks->count() > 0)
      <section class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-10">
        @foreach($bookmarks as $bookmark)
          <article class="flex space-x-6 bookmark-item" data-bookmark-id="{{ $bookmark->id }}" data-destination-id="{{ $bookmark->destination_id }}">
            <img class="w-40 h-40 rounded-xl object-cover flex-shrink-0" 
                 src="{{ asset($bookmark->destination->image) }}" 
                 alt="{{ $bookmark->destination->name }}"/>
            <div class="flex flex-col justify-between">
              <div>
                <h2 class="font-semibold text-sm mb-1">{{ $bookmark->destination->name }}</h2>
                <p class="text-[9px] leading-[1.1] text-gray-900 font-normal mb-3 max-w-[220px]">
                  {{ Str::limit($bookmark->destination->description, 150) }}
                </p>
                <p class="text-xs font-normal mb-1">
                  Rp {{ number_format($bookmark->destination->price, 0, ',', '.') }}/Person
                </p>
                <div class="flex items-center space-x-1 text-xs mb-3">
                  <div class="flex items-center space-x-0.5 text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                      @if($i <= floor($bookmark->destination->rating))
                        <i class="fas fa-star"></i>
                      @elseif($i - 0.5 <= $bookmark->destination->rating)
                        <i class="fas fa-star-half-alt"></i>
                      @else
                        <i class="far fa-star"></i>
                      @endif
                    @endfor
                  </div>
                  <span class="text-gray-900 font-semibold">{{ $bookmark->destination->rating }}</span>
                </div>
              </div>
              <div class="flex gap-2">
                <a href="{{ route('destinations.show', $bookmark->destination->id) }}" 
                   class="bg-[#FF9343] text-white text-xs rounded-md px-4 py-1 hover:bg-[#ff7e21] transition">
                  View Details
                </a>
                <button onclick="removeBookmark({{ $bookmark->destination->id }}, this)" 
                        class="bg-red-500 text-white text-xs rounded-md px-3 py-1 hover:bg-red-600 transition">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </div>
          </article>
        @endforeach
      </section>
    @else
      <div class="text-center py-20">
        <i class="far fa-bookmark text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg mb-2">No bookmarks yet</p>
        <p class="text-gray-400 text-sm mb-6">Start exploring and bookmark your favorite destinations!</p>
        <a href="{{ route('destinations.index') }}" 
           class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition">
          Explore Destinations
        </a>
      </div>
    @endif
  </main>

  {{-- Include Footer --}}
  @include('partials.footer')

  <script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    async function removeBookmark(destinationId, button) {
      if (!confirm('Are you sure you want to remove this bookmark?')) {
        return;
      }

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
          const article = button.closest('.bookmark-item');
          article.style.opacity = '0';
          article.style.transform = 'translateX(-20px)';
          article.style.transition = 'all 0.3s ease';
          
          setTimeout(() => {
            article.remove();
            
            const remainingBookmarks = document.querySelectorAll('.bookmark-item');
            if (remainingBookmarks.length === 0) {
              location.reload();
            }
          }, 300);
          
          showNotification('Bookmark removed!', 'success');
        }
      } catch (error) {
        console.error('Error:', error);
        showNotification('Something went wrong!', 'error');
      }
    }

    function showNotification(message, type) {
      const notification = document.createElement('div');
      notification.className = `fixed top-20 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
      }`;
      notification.textContent = message;
      document.body.appendChild(notification);
      
      setTimeout(() => {
        notification.remove();
      }, 3000);
    }
  </script>
</body>
</html>