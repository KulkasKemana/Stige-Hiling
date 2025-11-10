<!-- Navbar Component -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
    
    <!-- Logo Section -->
    <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-80 transition">
      <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" class="w-10 h-10 object-contain" alt="Healing Tour Logo" />
      <div class="text-xs font-semibold leading-tight">
        <div>Healing</div>
        <div class="font-normal text-gray-600">Tour And Travel</div>
      </div>
    </a>

    <!-- Navigation Links -->
    <nav class="hidden md:flex items-center space-x-8">
      <a href="{{ route('home') }}" class="text-sm font-medium hover:text-orange-500 transition {{ request()->routeIs('home') ? 'text-orange-500' : 'text-gray-700' }}">
        Home
      </a>
      <a href="{{ route('booking.index') }}" class="text-sm font-medium hover:text-orange-500 transition {{ request()->routeIs('booking.index') ? 'text-orange-500' : 'text-gray-700' }}">
        Schedule
      </a>
      <a href="{{ route('destinations.index') }}" class="text-sm font-medium hover:text-orange-500 transition {{ request()->routeIs('destinations.*') ? 'text-orange-500' : 'text-gray-700' }}">
        Destinations
      </a>
    </nav>

    <!-- User Section -->
    <div class="flex items-center gap-4">
      @auth
        <!-- Profile Button -->
        <button id="profileButton" type="button" class="flex items-center gap-3 hover:opacity-80 transition">
          <img src="{{ asset('assets/Profile-Icon.png') }}" class="w-9 h-9 rounded-full object-cover border-2 border-gray-200" alt="Profile" />
          <div class="hidden lg:block text-left">
            <div class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
          </div>
          <i class="fas fa-chevron-down text-gray-500 text-xs transition-transform" id="dropdownIcon"></i>
        </button>

        <!-- Dropdown Menu -->
        <div id="profileDropdown" class="hidden absolute right-6 top-full mt-3 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
          
          <!-- User Info Header -->
          <div class="p-4 bg-gradient-to-r from-orange-50 to-orange-100 border-b">
            <div class="flex items-center gap-3">
              <img src="{{ asset('assets/Profile-Icon.png') }}" class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm" alt="Profile" />
              <div class="flex-1 min-w-0">
                <h3 class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->name }}</h3>
                <p class="text-xs text-gray-600 truncate">{{ Auth::user()->email }}</p>
              </div>
            </div>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-3 gap-px bg-gray-200 border-b">
            <div class="bg-white p-3 text-center">
              <div class="text-lg font-bold text-gray-900">0</div>
              <div class="text-xs text-gray-500">Points</div>
            </div>
            <div class="bg-white p-3 text-center">
              <div class="text-lg font-bold text-gray-900">0</div>
              <div class="text-xs text-gray-500">Trips</div>
            </div>
            <div class="bg-white p-3 text-center">
              <div class="text-lg font-bold text-gray-900">0</div>
              <div class="text-xs text-gray-500">Saved</div>
            </div>
          </div>

          <!-- Menu Items -->
          <nav class="p-2">
            <a href="{{ route('profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 transition group">
              <i class="far fa-user w-5 text-gray-400 group-hover:text-orange-500 transition"></i>
              <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Profile</span>
            </a>
            <a href="{{ route('bookmark.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 transition group">
              <i class="far fa-bookmark w-5 text-gray-400 group-hover:text-orange-500 transition"></i>
              <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Bookmarked</span>
            </a>
            <a href="{{ route('cart.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 transition group">
              <i class="fas fa-shopping-cart w-5 text-gray-400 group-hover:text-orange-500 transition"></i>
              <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Cart</span>
            </a>
          </nav>

          <!-- Admin Link -->
          @auth
            @if(auth()->user()->is_admin)
              <div class="border-t">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 transition group">
                  <i class="fas fa-user-shield w-5 text-gray-400 group-hover:text-orange-500 transition"></i>
                  <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Admin Panel</span>
                </a>
              </div>
            @endif
          @endauth

          <!-- Logout -->
          <div class="border-t p-2">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-red-50 transition group">
                <i class="fas fa-sign-out-alt w-5 text-gray-400 group-hover:text-red-500 transition"></i>
                <span class="text-sm font-medium text-gray-700 group-hover:text-red-600">Log Out</span>
              </button>
            </form>
          </div>

          <!-- Footer -->
          <div class="bg-gray-50 px-4 py-2 text-center border-t">
            <p class="text-xs text-gray-500">Healing Tour & Travel © 2025</p>
          </div>

        </div>
      @else
        <!-- Guest Actions -->
        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-orange-500 transition">
          Login
        </a>
        <a href="{{ route('register') }}" class="px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium rounded-full transition shadow-sm hover:shadow-md">
          Sign Up
        </a>
      @endauth
    </div>

  </div>
</header>

<!-- Dropdown Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const profileBtn = document.getElementById('profileButton');
  const dropdown = document.getElementById('profileDropdown');
  const icon = document.getElementById('dropdownIcon');
  
  if (!profileBtn || !dropdown) return;

  profileBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    const isHidden = dropdown.classList.contains('hidden');
    
    if (isHidden) {
      dropdown.classList.remove('hidden');
      icon.style.transform = 'rotate(180deg)';
    } else {
      dropdown.classList.add('hidden');
      icon.style.transform = 'rotate(0deg)';
    }
  });

  document.addEventListener('click', function(e) {
    if (!dropdown.contains(e.target) && !profileBtn.contains(e.target)) {
      dropdown.classList.add('hidden');
      icon.style.transform = 'rotate(0deg)';
    }
  });
});
</script>

<style>
  #dropdownIcon {
    transition: transform 0.3s ease;
  }
</style>