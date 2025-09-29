<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Travel Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
   @keyframes fadeInDown {
     from { opacity: 0; transform: translateY(-10px); }
     to   { opacity: 1; transform: translateY(0); }
   }
   .animate-fadeInDown {
     animation: fadeInDown 0.3s ease-out forwards;
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
  #arrowButton.rotate {
    transform: rotate(180deg);
  }

  #arrowButton i {
    display: inline-block;
    transition: transform 220ms cubic-bezier(.2,.9,.2,1);
    transform: rotate(0deg);
    transform-origin: center;
  }
  #arrowButton.rotate i {
    transform: rotate(180deg);
  }
  </style>
 </head>
 <body class="bg-white pt-16">
  <!-- Navbar -->
<header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm">
  <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-3 relative">
    <!-- Left: Logo -->
    <div class="flex items-center gap-3">
      <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" class="w-10 h-10 object-contain" alt="Logo" />
      <div class="text-[11px] leading-[14px]">
        <div class="font-semibold text-black">Healing</div>
        <div class="text-black">Tour And Travel</div>
      </div>
    </div>

    <!-- Center: Navigation -->
    <nav class="flex space-x-8 text-[14px] font-medium text-black">
      <a href="{{ route('home') }}" class="hover:underline transition-colors">Home</a>
      <a href="{{ route('schedule.index') }}" class="hover:underline transition-colors">Schedule</a>
      <a href="{{ route('destinations.index') }}" class="hover:underline transition-colors">Destinations</a>
    </nav>

    <!-- Right: User info -->
    <div class="flex items-center gap-3">
      @auth
        <button id="profileButton" class="flex items-center gap-3 bg-transparent p-0 focus:outline-none">
          <img src="{{ asset('assets/Profile-Icon.png') }}" class="w-8 h-8 rounded-full object-cover" />
          <div class="min-w-[120px] text-right">
            <div class="text-sm font-semibold">{{ Auth::user()->name }}</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
          </div>
        </button>
        <button id="arrowButton" class="bg-gray-100 w-9 h-9 rounded-full flex items-center justify-center ml-1 focus:outline-none hover:bg-gray-200 transition">
          <i class="fas fa-chevron-down text-gray-700 text-sm"></i>
        </button>
      @else
        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-orange-500 transition-colors">Login</a>
        <a href="{{ route('register') }}" class="ml-4 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition-colors">Register</a>
      @endauth
    </div>

    <!-- Profile dropdown -->
    @auth
      <div id="profileDropdown" class="absolute right-6 top-full mt-2 min-w-[300px] max-w-[360px] w-auto bg-white rounded-2xl shadow-lg z-50 hidden overflow-auto">
        <div class="p-3 flex flex-col">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200 flex-shrink-0">
              <img src="{{ asset('assets/Profile-Icon.png') }}" alt="Profil" class="w-full h-full object-cover"/>
            </div>
            <div class="flex-1 min-w-0">
              <div class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</div>
              <div class="text-[11px] text-gray-500 truncate">{{ Auth::user()->email }}</div>
            </div>
          </div>

          <div class="flex items-center justify-between bg-gray-50 rounded-lg py-1.5 px-2 text-center text-xs mt-3">
            <div class="flex-1">
              <div class="font-semibold text-gray-700">0</div>
              <div class="text-gray-500">Points</div>
            </div>
            <div class="w-px h-6 bg-gray-200 mx-2"></div>
            <div class="flex-1">
              <div class="font-semibold text-gray-700">0</div>
              <div class="text-gray-500">Trips</div>
            </div>
            <div class="w-px h-6 bg-gray-200 mx-2"></div>
            <div class="flex-1">
              <div class="font-semibold text-gray-700">0</div>
              <div class="text-gray-500">Bucket</div>
            </div>
          </div>

          <nav class="mt-3 overflow-auto">
            <ul class="flex flex-col divide-y divide-gray-100 text-sm">
              <li>
                <a href="{{ route('profile') }}" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                  <div class="flex items-center gap-3">
                    <i class="far fa-user text-gray-400 w-5 text-center"></i>
                    <span class="truncate">Profile</span>
                  </div>
                  <i class="fas fa-chevron-right text-gray-400"></i>
                </a>
              </li>
              <li>
                <a href="{{ route('bookmark') }}" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                  <div class="flex items-center gap-3">
                    <i class="far fa-bookmark text-gray-400 w-5 text-center"></i>
                    <span class="truncate">Bookmarked</span>
                  </div>
                  <i class="fas fa-chevron-right text-gray-400"></i>
                </a>
              </li>
              <li>
                <a href="{{ route('cart.index') }}" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                  <div class="flex items-center gap-3">
                    <i class="fas fa-shopping-cart text-gray-400 w-5 text-center"></i>
                    <span class="truncate">Keranjang</span>
                  </div>
                  <i class="fas fa-chevron-right text-gray-400"></i>
                </a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                  @csrf
                  <button type="submit" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50 w-full text-left">
                    <div class="flex items-center gap-3">
                      <i class="fas fa-sign-out-alt text-gray-400 w-5 text-center"></i>
                      <span class="truncate">Log Out</span>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                  </button>
                </form>
              </li>
            </ul>
          </nav>

          <div class="mt-3 text-center text-[11px] text-gray-400 py-1">Healing Tour & Travel</div>
        </div>
      </div>
    @endauth
  </div>
</header>

  <!-- Cart Content -->
  <div class="max-w-7xl mx-auto p-6 flex flex-col lg:flex-row gap-8">
    <!-- Left Side - Cart Items -->
    <div class="flex-1">
      <h1 class="text-3xl font-bold text-black mb-6 text-center">Your Cart</h1>
      <div class="border border-gray-300 rounded-xl p-6 bg-white">
        
        <!-- Select All -->
        <div class="flex items-center gap-2 mb-6">
          <input type="checkbox" id="selectAll" class="w-4 h-4 text-orange-500">
          <label for="selectAll" class="text-gray-700 text-sm">Select All</label>
        </div>

        <!-- Cart Items -->
        <div class="space-y-6">
          <!-- Torii Gate -->
          <div class="flex items-center gap-4 border-b pb-6">
            <input type="checkbox" class="w-4 h-4 text-orange-500" checked>
            <img src="assets/shrine.png" alt="Torii Gate" class="w-24 h-24 rounded-lg object-cover">
            <div class="flex-1">
              <h3 class="font-semibold text-lg text-black">Torii Gate</h3>
              <p class="text-gray-600 text-sm">26 July 2025 · Kyoto, Japan</p>
              <p class="text-lg font-bold text-black mt-2">Rp. 2,000,000</p>
            </div>
            <button class="text-red-500 hover:text-red-700">
              <i class="fas fa-trash"></i>
            </button>
          </div>

          <!-- Borobudur -->
          <div class="flex items-center gap-4 border-b pb-6">
            <input type="checkbox" class="w-4 h-4 text-orange-500" checked>
            <img src="assets/borobudur.png" alt="Borobudur" class="w-24 h-24 rounded-lg object-cover">
            <div class="flex-1">
              <h3 class="font-semibold text-lg text-black">Borobudur Temple</h3>
              <p class="text-gray-600 text-sm">8 October 2025 · Yogyakarta, Indonesia</p>
              <p class="text-lg font-bold text-black mt-2">Rp. 1,000,000</p>
            </div>
            <button class="text-red-500 hover:text-red-700">
              <i class="fas fa-trash"></i>
            </button>
          </div>

          <!-- Eiffel Tower -->
          <div class="flex items-center gap-4">
            <input type="checkbox" class="w-4 h-4 text-orange-500" checked>
            <img src="assets/eifel.png" alt="Eiffel Tower" class="w-24 h-24 rounded-lg object-cover">
            <div class="flex-1">
              <h3 class="font-semibold text-lg text-black">Eiffel Tower</h3>
              <p class="text-gray-600 text-sm">10 December 2025 · Paris, France</p>
              <p class="text-lg font-bold text-black mt-2">Rp. 4,000,000</p>
            </div>
            <button class="text-red-500 hover:text-red-700">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Side - Order Summary -->
    <div class="w-full lg:w-80">
      <div class="bg-white rounded-2xl shadow p-6 sticky top-24">
        <h2 class="text-xl font-bold text-black mb-6">Order Summary</h2>
        
        <div class="space-y-4 mb-6">
          <div class="flex justify-between text-gray-700">
            <span>Subtotal (3 items)</span>
            <span>Rp. 5,000,000</span>
          </div>
          <div class="flex justify-between text-gray-700">
            <span>Service Fee</span>
            <span>Rp. 300,000</span>
          </div>
          <div class="border-t pt-4">
            <div class="flex justify-between text-lg font-bold text-black">
              <span>Total Payment</span>
              <span class="text-orange-500">Rp. 5,300,000</span>
            </div>
          </div>
        </div>

        <form method="POST" action="{{ route('cart.checkout') }}">
            @csrf
            <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 rounded-lg transition duration-200 flex items-center justify-center gap-2">
              Continue to Payment
              <i class="fas fa-arrow-right"></i>
            </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-[#3B2F33] text-white w-full">
  <div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-10 md:gap-0">
      <div class="md:w-1/4 space-y-3">
        <div class="flex items-center space-x-2">
          <img class="w-8 h-8" height="32" src="assets/Logo_Healing_no_bg.png" width="32"/>
          <div class="text-xs leading-tight">
            <p class="font-semibold">Healing</p>
            <p>Tour And Travel</p>
          </div>
        </div>
        <p class="text-[10px] leading-tight max-w-[180px]">
          Kami berkomitmen untuk memberikan pengalaman healing journey terbaik yang akan mengubah hidup anda menuju kebahagiaan dan kedamaian.
        </p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Destinations</p>
        <p>Saudi Arabia</p>
        <p>Japan</p>
        <p>Bali</p>
        <p>France</p>
        <p>Italia</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Follow Us</p>
        <p class="flex items-center gap-2"><i class="fas fa-globe"></i>@healingtourandtravel</p>
        <p class="flex items-center gap-2"><i class="fab fa-twitter"></i>@healingtourandtravel</p>
        <p class="flex items-center gap-2"><i class="fas fa-phone-alt"></i>+62 8909 9897 3563</p>
        <p class="flex items-center gap-2"><i class="fas fa-envelope"></i>healing@gmail.com</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Company</p>
        <p>About Us</p>
        <p>Partners</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Help</p>
        <p>Help Center</p>
        <p>FAQ</p>
        <p>Terms &amp; Conditions</p>
        <p>Privacy Policy</p>
      </div>
    </div>

    <div class="mt-10 border-t border-[#5A4E50] pt-4 text-[10px] text-center">
      Copyright © 2025 Healing Tour and Travel
    </div>

    <div class="flex justify-end mt-4">
      <a aria-label="WhatsApp" href="https://wa.me/62890998973563" target="_blank" rel="noopener noreferrer" class="bg-[#25D366] w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-[#1ebe57] transition-colors duration-300">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
      </a>
    </div>
  </div>
</footer>

  <script>
    // Profile dropdown functionality
    const profileButton = document.getElementById('profileButton');
    const arrowButton = document.getElementById('arrowButton');
    const profileDropdown = document.getElementById('profileDropdown');

    function toggleDropdown() {
      const isHidden = profileDropdown.classList.contains('hidden');
      
      if (isHidden) {
        profileDropdown.classList.remove('hidden');
        profileDropdown.classList.remove('popup-animate-out');
        profileDropdown.classList.add('popup-animate-in');
        arrowButton.classList.add('rotate');
      } else {
        profileDropdown.classList.remove('popup-animate-in');
        profileDropdown.classList.add('popup-animate-out');
        arrowButton.classList.remove('rotate');
        setTimeout(() => {
          if (profileDropdown.classList.contains('popup-animate-out')) {
            profileDropdown.classList.add('hidden');
          }
        }, 240);
      }
    }

    profileButton.addEventListener('click', toggleDropdown);
    arrowButton.addEventListener('click', toggleDropdown);

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
      if (!profileButton.contains(event.target) && 
          !arrowButton.contains(event.target) && 
          !profileDropdown.contains(event.target)) {
        if (!profileDropdown.classList.contains('hidden')) {
          profileDropdown.classList.remove('popup-animate-in');
          profileDropdown.classList.add('popup-animate-out');
          arrowButton.classList.remove('rotate');
          setTimeout(() => {
            if (profileDropdown.classList.contains('popup-animate-out')) {
              profileDropdown.classList.add('hidden');
            }
          }, 240);
        }
      }
    });

    // Cart functionality
    let cartData = [
      { id: 1, name: "Torii Gate", location: "Hiroshima, Japan", price: 2000000, selected: true },
      { id: 2, name: "Borobudur Temple", location: "Magelang, Indonesia", price: 1000000, selected: true },
      { id: 3, name: "Eiffel Tower", location: "Paris, France", price: 4000000, selected: false }
    ];

    function formatCurrency(amount) {
      return 'Rp. ' + amount.toLocaleString('id-ID');
    }

    function updateSummary() {
      const selectedItems = cartData.filter(item => item.selected);
      const subtotal = selectedItems.reduce((sum, item) => sum + item.price, 0);
      const serviceFee = selectedItems.length > 0 ? 300000 : 0;
      const total = subtotal + serviceFee;

      document.getElementById('itemCount').textContent = selectedItems.length;
      document.getElementById('subtotal').textContent = formatCurrency(subtotal);
      document.getElementById('serviceFee').textContent = formatCurrency(serviceFee);
      document.getElementById('totalPayment').textContent = formatCurrency(total);
      
      document.getElementById('continueBtn').disabled = selectedItems.length === 0;
    }

    function updateSelectAll() {
      const selectAllCheckbox = document.getElementById('selectAll');
      const allSelected = cartData.every(item => item.selected);
      const someSelected = cartData.some(item => item.selected);
      
      selectAllCheckbox.checked = allSelected;
      selectAllCheckbox.indeterminate = someSelected && !allSelected;
    }

    function checkEmptyCart() {
      const cartItems = document.getElementById('cartItems');
      const emptyCart = document.getElementById('emptyCart');
      
      if (cartData.length === 0) {
        cartItems.classList.add('hidden');
        emptyCart.classList.remove('hidden');
      } else {
        cartItems.classList.remove('hidden');
        emptyCart.classList.add('hidden');
      }
    }

    // Event listeners
    document.getElementById('selectAll').addEventListener('change', function() {
      const isChecked = this.checked;
      cartData.forEach(item => item.selected = isChecked);
      
      document.querySelectorAll('.item-checkbox').forEach(checkbox => {
        checkbox.checked = isChecked;
      });
      
      updateSummary();
    });

    document.querySelectorAll('.item-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const itemId = parseInt(this.dataset.id);
        const item = cartData.find(item => item.id === itemId);
        if (item) {
          item.selected = this.checked;
          updateSummary();
          updateSelectAll();
        }
      });
    });

    document.querySelectorAll('.remove-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const itemId = parseInt(this.dataset.id);
        if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
          cartData = cartData.filter(item => item.id !== itemId);
          this.closest('.cart-item').remove();
          updateSummary();
          updateSelectAll();
          checkEmptyCart();
        }
      });
    });

    document.getElementById('continueBtn').addEventListener('click', function() {
      const selectedItems = cartData.filter(item => item.selected);
      if (selectedItems.length > 0) {
        alert(`Melanjutkan ke pembayaran dengan ${selectedItems.length} item!`);
      }
    });

    // Initialize
    updateSummary();
    updateSelectAll();
    checkEmptyCart();
  </script>
 </body>
</html>