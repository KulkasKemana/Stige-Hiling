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
        .hero-gradient {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.8) 0%, rgba(249, 115, 22, 0.9) 100%);
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }
        .feature-card:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-3">
            <div class="flex items-center gap-3">
                <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" class="w-10 h-10 object-contain" alt="Logo" />
                <div class="text-[11px] leading-[14px]">
                    <div class="font-semibold text-black">Healing</div>
                    <div class="text-black">Tour And Travel</div>
                </div>
            </div>
            
            <nav class="flex space-x-8 text-[14px] font-medium text-black">
                <a href="/home" class="hover:underline transition-colors">Home</a>
                <a href="#" class="hover:underline transition-colors">Schedule</a>
                <a href="{{ route('destinations.index') }}" class="hover:underline transition-colors">Destinations</a>
            </nav>
            
            <div class="flex items-center gap-3">
                @auth
                    <span class="text-sm">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-gray-800">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-orange-500">Login</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <div class="pt-20 pb-4">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="/home" class="hover:text-orange-500">Home</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('destinations.index') }}" class="hover:text-orange-500">Destinations</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-900 font-medium">{{ $destination->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative">
        <div class="relative h-96 bg-cover bg-center hero-gradient" 
             style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $destination->image }}');">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $destination->name }}</h1>
                    <p class="text-xl mb-6 max-w-2xl">{{ $destination->description ?? 'Discover the beauty and wonder of this amazing destination with our expertly crafted tour packages.' }}</p>
                    <div class="flex items-center justify-center gap-6 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="far fa-clock"></i>
                            <span>{{ $destination->duration ?? '3 days 2 nights' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $destination->location ?? $destination->name }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-users"></i>
                            <span>Group Tour</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-12 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Overview -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold mb-6">Tour Overview</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600 leading-relaxed mb-6">
                            {{ $destination->description ?? 'Embark on an unforgettable journey to one of the world\'s most captivating destinations. Our carefully curated tour package offers the perfect blend of adventure, culture, and relaxation, ensuring you create memories that will last a lifetime.' }}
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
                        @if(str_contains($destination->duration ?? '', '4') || str_contains($destination->duration ?? '', '5') || str_contains($destination->duration ?? '', '6'))
                        <div class="border-l-4 border-orange-200 pl-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Day 4 - Free Time & Departure</h3>
                            <p class="text-gray-600">Free time for shopping, relaxation, or optional activities before airport transfer and departure.</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Inclusions & Exclusions -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold mb-6">What's Included</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-green-600">✓ Included</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500"></i>
                                    <span>Accommodation ({{ str_contains($destination->duration ?? '', '3') ? '2' : (str_contains($destination->duration ?? '', '4') ? '3' : '4') }} nights)</span>
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
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500"></i>
                                    <span>Travel insurance</span>
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
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-times text-red-500"></i>
                                    <span>Visa fees (if required)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Reviews -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold mb-6">Customer Reviews</h2>
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('assets/Profile-Icon.png') }}" alt="User" class="w-12 h-12 rounded-full">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h4 class="font-semibold">Sarah Johnson</h4>
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <p class="text-gray-600">"Amazing experience! The tour was well organized and our guide was incredibly knowledgeable. Would definitely recommend!"</p>
                                    <p class="text-sm text-gray-400 mt-2">2 weeks ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('assets/Profile-Icon.png') }}" alt="User" class="w-12 h-12 rounded-full">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h4 class="font-semibold">Michael Chen</h4>
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <p class="text-gray-600">"Great value for money. The accommodations were comfortable and the itinerary was perfect for first-time visitors."</p>
                                    <p class="text-sm text-gray-400 mt-2">1 month ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Booking Form -->
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <!-- Price Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                        <div class="text-center mb-6">
                            <div class="text-3xl font-bold text-orange-500">
                                Rp {{ number_format($destination->price ?? 0, 0, ',', '.') }}
                            </div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>

                        <!-- Booking Form -->
                        @auth
                            <form action="{{ route('book.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                                
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
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
                                
                                <div>
                                    <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="far fa-calendar mr-1"></i>
                                        Departure Date
                                    </label>
                                    <input type="date" name="booking_date" id="booking_date" 
                                           min="{{ date('Y-m-d') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                                
                                <!-- Total Price Display -->
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Total Price:</span>
                                        <span id="totalPrice" class="font-semibold text-lg">Rp {{ number_format($destination->price ?? 0, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                
                                <button type="submit" 
                                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                                    <i class="fas fa-shopping-cart"></i>
                                    Add to Cart
                                </button>
                            </form>
                        @else
                            <div class="text-center">
                                <p class="text-gray-600 mb-4">Please login to book this destination</p>
                                <a href="{{ route('login') }}" 
                                   class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-6 rounded-lg transition duration-200 inline-flex items-center justify-center gap-2">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Login to Book
                                </a>
                            </div>
                        @endauth

                        <!-- Features -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h3 class="text-sm font-semibold mb-3 text-gray-900">Why Book With Us?</h3>
                            <div class="space-y-3 text-sm">
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
                                    <span>24/7 Customer Support</span>
                                </div>
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i class="fas fa-award text-yellow-500"></i>
                                    <span>Verified Reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-6 text-white">
                        <h3 class="text-lg font-semibold mb-3">Need Help?</h3>
                        <p class="text-sm mb-4 text-orange-100">Our travel experts are here to help you plan the perfect trip.</p>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-phone"></i>
                                <span>+62 890 9989 7356</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-envelope"></i>
                                <span>healing@gmail.com</span>
                            </div>
                        </div>
                        <a href="https://wa.me/62890998973563" target="_blank"
                           class="mt-4 w-full bg-white text-orange-600 font-medium py-2 px-4 rounded-lg transition duration-200 inline-flex items-center justify-center gap-2 hover:bg-gray-50">
                            <i class="fab fa-whatsapp"></i>
                            Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center gap-2">
                <i class="fas fa-check"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center gap-2">
                <i class="fas fa-times"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- JavaScript -->
    <script>
        // Calculate total price based on quantity
        const quantitySelect = document.getElementById('quantity');
        const totalPriceElement = document.getElementById('totalPrice');
        const basePrice = {{ $destination->price ?? 0 }};

        if (quantitySelect && totalPriceElement) {
            quantitySelect.addEventListener('change', function() {
                const quantity = parseInt(this.value);
                const totalPrice = basePrice * quantity;
                totalPriceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
            });
        }

        // Auto hide messages after 5 seconds
        setTimeout(function() {
            const messages = document.querySelectorAll('.fixed.bottom-4');
            messages.forEach(msg => {
                msg.style.opacity = '0';
                setTimeout(() => msg.style.display = 'none', 300);
            });
        }, 5000);

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>