<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Shopping Cart - Healing Tour & Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
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
  </style>
</head>
<body class="bg-gray-50 pt-20">

  {{-- Include Navbar --}}
  @include('partials.navbar')

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto p-6 pb-16">
    
    <!-- Page Header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Shopping Cart</h1>
      <p class="text-gray-600">Review your selected destinations before checkout</p>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
      <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    @if(session('error'))
      <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center gap-2">
        <i class="fas fa-exclamation-circle"></i>
        <span>{{ session('error') }}</span>
      </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-8">
      
      <!-- Left Side - Cart Items -->
      <div class="flex-1">
        @if($cartItems->isEmpty())
          <!-- Empty Cart State -->
          <div class="bg-white rounded-2xl shadow-sm p-12 text-center">
            <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Your cart is empty</h3>
            <p class="text-gray-500 mb-6">Start exploring amazing destinations!</p>
            <a href="{{ route('destinations.index') }}" 
               class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-medium transition">
              <i class="fas fa-compass mr-2"></i>
              Explore Destinations
            </a>
          </div>
        @else
          <div class="bg-white rounded-2xl shadow-sm p-6">
            
            <!-- Cart Items List -->
            <div class="space-y-6">
              @foreach($cartItems as $item)
                <div class="flex items-center gap-4 pb-6 border-b last:border-b-0">
                  
                  <!-- Image -->
                  <img src="{{ asset($item->destination->image) }}" 
                       alt="{{ $item->destination->name }}" 
                       class="w-24 h-24 rounded-lg object-cover flex-shrink-0">
                  
                  <!-- Info -->
                  <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-lg text-gray-900 truncate">{{ $item->destination->name }}</h3>
                    <p class="text-gray-600 text-sm">
                      <i class="fas fa-map-marker-alt mr-1"></i>{{ $item->destination->location }}
                    </p>
                    <p class="text-gray-600 text-sm">
                      <i class="far fa-calendar mr-1"></i>{{ $item->booking_date ? \Carbon\Carbon::parse($item->booking_date)->format('d M Y') : 'Date not set' }}
                    </p>
                    <div class="flex items-center gap-4 mt-3">
                      <span class="text-lg font-bold text-orange-500">
                        Rp {{ number_format($item->total_price, 0, ',', '.') }}
                      </span>
                      <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Qty:</label>
                        <select class="border border-gray-300 rounded px-2 py-1 text-sm quantity-select" 
                                data-cart-id="{{ $item->id }}"
                                data-price="{{ $item->price }}">
                          @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Delete Button -->
                  <form method="POST" action="{{ route('cart.destroy', $item->id) }}" 
                        onsubmit="return confirm('Remove this item from cart?')"
                        class="flex-shrink-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              @endforeach
            </div>

            <!-- Clear Cart Button -->
            @if($cartItems->count() > 1)
              <div class="mt-6 pt-6 border-t">
                <form method="POST" action="{{ route('cart.clear') }}" 
                      onsubmit="return confirm('Clear all items from cart?')"
                      class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="text-red-600 hover:text-red-700 text-sm font-medium flex items-center gap-2">
                    <i class="far fa-trash-alt"></i>
                    Clear Cart
                  </button>
                </form>
              </div>
            @endif
          </div>
        @endif
      </div>

      <!-- Right Side - Order Summary -->
      @if(!$cartItems->isEmpty())
        <div class="w-full lg:w-96">
          <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
            
            <div class="space-y-4 mb-6">
              <div class="flex justify-between text-gray-700">
                <span>Subtotal ({{ $cartItems->count() }} item{{ $cartItems->count() > 1 ? 's' : '' }})</span>
                <span id="subtotal">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
              </div>
              <div class="flex justify-between text-gray-700">
                <span>Service Fee</span>
                <span>Rp 300,000</span>
              </div>
              <div class="border-t pt-4">
                <div class="flex justify-between text-lg font-bold text-gray-900">
                  <span>Total Payment</span>
                  <span class="text-orange-500" id="total">Rp {{ number_format($totalPrice + 300000, 0, ',', '.') }}</span>
                </div>
              </div>
            </div>

            <!-- Checkout Button -->
            <form method="POST" action="{{ route('cart.checkout') }}">
              @csrf
              <button type="submit"
                      class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                Continue to Payment
                <i class="fas fa-arrow-right"></i>
              </button>
            </form>

            <!-- Features -->
            <div class="mt-6 pt-6 border-t space-y-3 text-sm">
              <div class="flex items-center gap-2 text-gray-600">
                <i class="fas fa-shield-alt text-green-500"></i>
                <span>Secure Checkout</span>
              </div>
              <div class="flex items-center gap-2 text-gray-600">
                <i class="fas fa-undo text-blue-500"></i>
                <span>Free Cancellation</span>
              </div>
              <div class="flex items-center gap-2 text-gray-600">
                <i class="fas fa-headset text-purple-500"></i>
                <span>24/7 Support</span>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

  {{-- Include Footer --}}
  @include('partials.footer')

  <!-- JavaScript for Update Quantity -->
  <script>
    document.querySelectorAll('.quantity-select').forEach(select => {
      select.addEventListener('change', function() {
        const cartId = this.dataset.cartId;
        const quantity = this.value;
        
        // Send AJAX request to update quantity
        fetch(`/cart/${cartId}`, {
          method: 'PATCH',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
          },
          body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
          if(data.success) {
            // Reload page to update totals
            window.location.reload();
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Failed to update quantity');
        });
      });
    });

    // Auto hide messages
    setTimeout(() => {
      document.querySelectorAll('.bg-green-100, .bg-red-100').forEach(el => {
        el.style.opacity = '0';
        setTimeout(() => el.remove(), 300);
      });
    }, 5000);
  </script>
</body>
</html>