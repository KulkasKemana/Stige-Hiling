<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - Book Now | Healing Tour & Travel</title>
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

    <!-- Breadcrumb -->
    <div class="pb-4">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-orange-500">Home</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('destinations.index') }}" class="hover:text-orange-500">Destinations</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-900 font-medium">{{ $destination->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative mb-12">
        <div class="relative h-96 bg-cover bg-center" 
             style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset($destination->image) }}');">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $destination->name }}</h1>
                    <p class="text-xl mb-6 max-w-2xl mx-auto">{{ $destination->description }}</p>
                    <div class="flex items-center justify-center gap-6 text-sm flex-wrap">
                        <div class="flex items-center gap-2">
                            <i class="far fa-clock"></i>
                            <span>{{ $destination->duration }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $destination->location }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span>{{ $destination->rating }} Rating</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto pb-12 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Content -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Overview -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold mb-6">Tour Overview</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600 leading-relaxed mb-6">
                            {{ $destination->description }}
                        </p>
                        
                        <h3 class="text-xl font-semibold mb-4">What Makes This Tour Special</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>Expert local guides with extensive knowledge</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>Carefully selected accommodations for comfort</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>Authentic cultural experiences and local cuisine</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>Small group sizes for personalized attention</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Itinerary -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold mb-6">Tour Itinerary</h2>
                    <div class="space-y-6">
                        <div class="border-l-4 border-orange-500 pl-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Day 1 - Arrival & Welcome</h3>
                            <p class="text-gray-600">Airport pickup, hotel check-in, welcome dinner, and orientation session with your tour guide.</p>
                        </div>
                        <div class="border-l-4 border-orange-300 pl-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Day 2 - City Exploration</h3>
                            <p class="text-gray-600">Full day city tour visiting major landmarks, museums, and cultural sites with authentic local lunch.</p>
                        </div>
                        <div class="border-l-4 border-orange-300 pl-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Day 3 - Adventure & Nature</h3>
                            <p class="text-gray-600">Outdoor activities, nature exploration, scenic viewpoints, and traditional cultural performances.</p>
                        </div>
                    </div>
                </div>

                <!-- Inclusions -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold mb-6">What's Included</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-green-600">✓ Included</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500"></i>
                                    <span>Accommodation</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500"></i>
                                    <span>Daily breakfast & selected meals</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500"></i>
                                    <span>Airport transfers</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500"></i>
                                    <span>Professional tour guide</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500"></i>
                                    <span>Entrance fees to attractions</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-red-600">✗ Not Included</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-times text-red-500"></i>
                                    <span>International flights</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-times text-red-500"></i>
                                    <span>Personal expenses</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-times text-red-500"></i>
                                    <span>Optional activities</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-times text-red-500"></i>
                                    <span>Tips for guide & driver</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Booking Form -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    
                    <!-- Price Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="text-center mb-6">
                            <div class="text-3xl font-bold text-orange-500">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>

                        <!-- Booking Form -->
                        @auth
                            <form action="{{ route('cart.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-users mr-1"></i>
                                        Number of Travelers
                                    </label>
                                    <select name="quantity" id="quantity" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }} Person{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>
                                </div>
                                
                                <!-- Total Price Display -->
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Total Price:</span>
                                        <span id="totalPrice" class="font-semibold text-lg">Rp {{ number_format($destination->price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                
                                <button type="submit" 
                                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 rounded-lg transition flex items-center justify-center gap-2">
                                    <i class="fas fa-shopping-cart"></i>
                                    Add to Cart
                                </button>
                            </form>
                        @else
                            <div class="text-center">
                                <p class="text-gray-600 mb-4">Please login to book this destination</p>
                                <a href="{{ route('login') }}" 
                                   class="block bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 rounded-lg transition">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    Login to Book
                                </a>
                            </div>
                        @endauth

                        <!-- Features -->
                        <div class="mt-6 pt-6 border-t space-y-3 text-sm">
                            <div class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-shield-alt text-green-500"></i>
                                <span>Best Price Guarantee</span>
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

                    <!-- Contact Card -->
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-6 text-white">
                        <h3 class="text-lg font-semibold mb-3">Need Help?</h3>
                        <p class="text-sm mb-4 text-orange-100">Our travel experts are here to help you.</p>
                        <a href="https://wa.me/62890998973563" target="_blank"
                           class="block bg-white text-orange-600 font-medium py-2 px-4 rounded-lg transition hover:bg-gray-50 text-center">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Include Footer --}}
    @include('partials.footer')

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in">
            <i class="fas fa-check mr-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in">
            <i class="fas fa-times mr-2"></i>{{ session('error') }}
        </div>
    @endif

    <!-- JavaScript -->
    <script>
        // Calculate total price
        const quantitySelect = document.getElementById('quantity');
        const totalPriceElement = document.getElementById('totalPrice');
        const basePrice = {{ $destination->price }};

        if (quantitySelect && totalPriceElement) {
            quantitySelect.addEventListener('change', function() {
                const quantity = parseInt(this.value);
                const totalPrice = basePrice * quantity;
                totalPriceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
            });
        }

        // Auto hide messages
        setTimeout(() => {
            document.querySelectorAll('.fixed.bottom-4').forEach(el => {
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 300);
            });
        }, 5000);
    </script>
</body>
</html>