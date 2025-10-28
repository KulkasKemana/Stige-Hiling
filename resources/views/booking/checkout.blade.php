<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Checkout - Healing Tour and Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 pt-20">
  
  {{-- Include Navbar --}}
  @include('partials.navbar')

  <div class="min-h-[calc(100vh-80px)] py-12">
    <div class="max-w-7xl mx-auto px-6">
      
      <!-- Header -->
      <div class="flex items-center space-x-2 mb-8">
        <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-gray-900">
          <i class="fas fa-arrow-left text-lg"></i>
        </a>
        <h1 class="font-semibold text-2xl">Checkout</h1>
      </div>

      <form action="{{ route('booking.checkout.process') }}" method="POST" class="flex flex-col lg:flex-row gap-8">
        @csrf
        
        <!-- Left: Personal Info & Reservation -->
        <div class="flex-1 max-w-2xl">
          <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-sm">
            
            <!-- Personal Identity -->
            <fieldset class="mb-8">
              <legend class="font-semibold text-lg mb-4">Personal Identity</legend>
              
              <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                  <label class="text-sm font-medium mb-2 block" for="firstName">
                    First Name <span class="text-red-500">*</span>
                  </label>
                  <input 
                    class="border border-gray-300 rounded-lg text-sm px-4 py-2.5 w-full focus:outline-none focus:ring-2 focus:ring-orange-400" 
                    id="firstName" 
                    name="first_name" 
                    type="text"
                    value="{{ old('first_name', explode(' ', Auth::user()->name)[0] ?? '') }}"
                    required/>
                </div>
                <div>
                  <label class="text-sm font-medium mb-2 block" for="lastName">
                    Last Name
                  </label>
                  <input 
                    class="border border-gray-300 rounded-lg text-sm px-4 py-2.5 w-full focus:outline-none focus:ring-2 focus:ring-orange-400" 
                    id="lastName" 
                    name="last_name" 
                    type="text"
                    value="{{ old('last_name', implode(' ', array_slice(explode(' ', Auth::user()->name), 1)) ?? '') }}"/>
                </div>
              </div>
              
              <div class="mb-4">
                <label class="text-sm font-medium mb-2 block" for="email">
                  Email <span class="text-red-500">*</span>
                </label>
                <input 
                  class="border border-gray-300 rounded-lg text-sm px-4 py-2.5 w-full focus:outline-none focus:ring-2 focus:ring-orange-400" 
                  id="email" 
                  name="email" 
                  type="email"
                  value="{{ old('email', Auth::user()->email) }}"
                  required/>
              </div>
              
              <div class="mb-4">
                <label class="text-sm font-medium mb-2 block" for="address">
                  Address <span class="text-red-500">*</span>
                </label>
                <input 
                  class="border border-gray-300 rounded-lg text-sm px-4 py-2.5 w-full focus:outline-none focus:ring-2 focus:ring-orange-400" 
                  id="address" 
                  name="address" 
                  type="text"
                  value="{{ old('address') }}"
                  required/>
              </div>
              
              <div class="mb-4">
                <label class="text-sm font-medium mb-2 block" for="phone">
                  Phone Number <span class="text-red-500">*</span>
                </label>
                <input 
                  class="border border-gray-300 rounded-lg text-sm px-4 py-2.5 w-full focus:outline-none focus:ring-2 focus:ring-orange-400" 
                  id="phone" 
                  name="phone" 
                  type="tel"
                  placeholder="0812345678"
                  value="{{ old('phone') }}"
                  required/>
              </div>
            </fieldset>

            <hr class="border-gray-300 my-6"/>

            <!-- Reservation -->
            <fieldset>
              <legend class="font-semibold text-lg mb-4">Reservation Details</legend>
              
              <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                  <label class="text-sm font-medium mb-2 block" for="checkIn">
                    Travel Date <span class="text-red-500">*</span>
                  </label>
                  <div class="relative">
                    <input 
                      class="border border-gray-300 rounded-lg text-sm px-4 py-2.5 w-full pr-10 focus:outline-none focus:ring-2 focus:ring-orange-400" 
                      id="checkIn" 
                      name="travel_date" 
                      type="date"
                      min="{{ date('Y-m-d') }}"
                      value="{{ old('travel_date') }}"
                      required/>
                    <i class="fas fa-calendar-alt absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                  </div>
                </div>
                
                <div>
                  <label class="text-sm font-medium mb-2 block">
                    Duration
                  </label>
                  <div class="border border-gray-300 rounded-lg text-sm px-4 py-2.5 bg-gray-50">
                    Based on package
                  </div>
                </div>
              </div>

              <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-sm text-blue-800">
                <i class="fas fa-info-circle mr-2"></i>
                <span>All booking details are taken from your cart items</span>
              </div>
            </fieldset>
          </div>
        </div>

        <!-- Right: Booking Summary -->
        <div class="flex-1 max-w-md">
          <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-sm sticky top-24">
            
            <h2 class="text-xl font-semibold mb-4">Booking Summary</h2>
            <hr class="border-gray-300 mb-4"/>

            <!-- Cart Items -->
            <div class="space-y-4 mb-6">
              @php
                $subtotal = 0;
              @endphp
              
              @forelse($cartItems as $item)
                @php
                  $itemTotal = $item->destination->price * $item->quantity;
                  $subtotal += $itemTotal;
                @endphp
                
                <div class="flex gap-3">
                  <img src="{{ asset($item->destination->image) }}" 
                       alt="{{ $item->destination->name }}" 
                       class="w-16 h-16 rounded-lg object-cover">
                  <div class="flex-1">
                    <h3 class="font-semibold text-sm">{{ $item->destination->name }}</h3>
                    <p class="text-xs text-gray-500">{{ $item->destination->location }}</p>
                    <p class="text-xs text-gray-600 mt-1">
                      {{ $item->quantity }}x person • Rp {{ number_format($item->destination->price, 0, ',', '.') }}
                    </p>
                    <p class="text-sm font-semibold text-orange-500 mt-1">
                      Rp {{ number_format($itemTotal, 0, ',', '.') }}
                    </p>
                  </div>
                </div>
              @empty
                <p class="text-center text-gray-500 py-4">No items in cart</p>
              @endforelse
            </div>

            <hr class="border-gray-300 mb-4"/>

            <!-- Price Details -->
            <div class="space-y-2 mb-6">
              <div class="flex justify-between text-sm">
                <span class="text-gray-600">Subtotal</span>
                <span class="font-medium">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
              </div>
              
              @php
                $tax = $subtotal * 0.02; // 2% tax
                $discount = 0; // You can add discount logic here
                $total = $subtotal + $tax - $discount;
              @endphp
              
              <div class="flex justify-between text-sm">
                <span class="text-gray-600">Tax (2%)</span>
                <span class="font-medium">Rp {{ number_format($tax, 0, ',', '.') }}</span>
              </div>
              
              @if($discount > 0)
              <div class="flex justify-between text-sm">
                <span class="text-gray-600">Discount</span>
                <span class="font-medium text-orange-500">- Rp {{ number_format($discount, 0, ',', '.') }}</span>
              </div>
              @endif
              
              <hr class="border-gray-300 my-3"/>
              
              <div class="flex justify-between text-lg font-bold">
                <span>Total</span>
                <span class="text-orange-500">Rp {{ number_format($total, 0, ',', '.') }}</span>
              </div>
            </div>

            <!-- Submit Button -->
            <button 
              type="submit" 
              class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-lg px-6 py-3 transition duration-200 flex items-center justify-center gap-2"
              {{ $cartItems->isEmpty() ? 'disabled' : '' }}>
              <i class="fas fa-credit-card"></i>
              Proceed to Payment
            </button>

            <p class="text-xs text-gray-500 text-center mt-4">
              By proceeding, you agree to our Terms & Conditions
            </p>
          </div>
        </div>
      </form>

    </div>
  </div>

  {{-- Include Footer --}}
  @include('partials.footer')

  <script>
    // Auto-fill full name in booking summary
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    
    function updateFullName() {
      const fullName = (firstName.value + ' ' + lastName.value).trim();
      console.log('Full name:', fullName);
    }
    
    firstName?.addEventListener('input', updateFullName);
    lastName?.addEventListener('input', updateFullName);
  </script>
</body>
</html>