<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Healing Tour and Travel Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
    
    /* Carousel animations */
    @keyframes slideIn {
      from { transform: translateX(100%); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
      from { transform: translateX(0); opacity: 1; }
      to { transform: translateX(-100%); opacity: 0; }
    }
    
    .carousel-enter {
      animation: slideIn 0.7s ease-out forwards;
    }
    
    .carousel-exit {
      animation: slideOut 0.7s ease-out forwards;
    }
    
    /* Dot indicator active state */
    .dot-active {
      width: 1.25rem;
      background-color: #3b6dfd;
    }
    
    .dot-inactive {
      width: 1rem;
      background-color: #a9b3f7;
    }
  </style>
</head>
<body class="bg-[#f5f5f7] min-h-screen flex items-center justify-center p-6">
  <main class="bg-white rounded-[40px] shadow-[0_0_30px_rgba(0,0,0,0.15)] max-w-5xl w-full flex flex-col md:flex-row overflow-hidden">

    <!-- LEFT: Carousel -->
    <section class="hidden md:flex md:w-1/2 w-full bg-white flex-col justify-center relative p-3">
      <div class="overflow-hidden rounded-tl-[24px] rounded-bl-[24px] rounded-br-[120px] relative w-full aspect-[3/4] shadow-md">
        <!-- Carousel Images -->
        <img id="imgA" 
             src="{{ asset('assets/carousel-1.jpg') }}" 
             alt="Travel destination 1"
             class="absolute inset-0 w-full h-full object-cover transition-all duration-700" 
             style="transform: translateX(0); opacity: 1;" />
        <img id="imgB" 
             src="{{ asset('assets/carousel-2.jpg') }}" 
             alt="Travel destination 2"
             class="absolute inset-0 w-full h-full object-cover transition-all duration-700" 
             style="transform: translateX(100%); opacity: 0;" />
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
        
        <!-- Caption -->
        <div id="carousel-caption" class="absolute bottom-16 left-6 right-6 text-white">
          <h3 class="font-bold text-base mb-1 drop-shadow-lg">Discover Amazing Places</h3>
          <p class="text-xs opacity-90 drop-shadow-md">Start your healing journey today</p>
        </div>
        
        <!-- Dot Indicators -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
          <button onclick="setCarousel(0)" 
                  id="dot-0" 
                  class="dot-active h-2 rounded-full transition-all duration-300 cursor-pointer hover:opacity-80"
                  aria-label="Slide 1"></button>
          <button onclick="setCarousel(1)" 
                  id="dot-1" 
                  class="dot-inactive h-2 rounded-full transition-all duration-300 cursor-pointer hover:opacity-80"
                  aria-label="Slide 2"></button>
          <button onclick="setCarousel(2)" 
                  id="dot-2" 
                  class="dot-inactive h-2 rounded-full transition-all duration-300 cursor-pointer hover:opacity-80"
                  aria-label="Slide 3"></button>
        </div>
      </div>
    </section>

    <!-- RIGHT: Login Form (TIDAK DIUBAH) -->
    <section class="md:w-1/2 w-full flex flex-col justify-center items-center p-8 md:p-14">
      <div class="w-full max-w-md">
        <div class="flex items-center space-x-3 mb-6">
          <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" alt="logo" class="w-10 h-10 object-contain" />
          <div class="text-sm font-bold leading-tight">
            Healing<br/>Tour And Travel
          </div>
        </div>

        <h1 class="text-2xl font-extrabold mb-2 leading-tight">
          WELCOME TO<br />HEALING TOUR AND TRAVEL
        </h1>
        <p class="text-sm mb-8">Please enter log in details below</p>

        {{-- Success Message --}}
        @if(session('success'))
          <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
          </div>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
          <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <ul class="list-disc list-inside space-y-1">
              @foreach($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="w-full space-y-4" id="loginForm">
          @csrf
          
          <div>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                   class="w-full border @error('email') border-red-500 @else border-black @enderror rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none focus:ring-2 focus:ring-[#ff914d]" 
                   required autofocus />
            @error('email')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="relative">
            <input type="password" name="password" id="password" placeholder="Password"
                   class="w-full border @error('password') border-red-500 @else border-black @enderror rounded-lg px-5 py-3 pr-32 text-base placeholder-black focus:outline-none focus:ring-2 focus:ring-[#ff914d]" 
                   required />
            <button type="button" onclick="togglePassword()" class="absolute right-24 top-1/2 -translate-y-1/2 text-gray-600 hover:text-gray-800">
              <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
            <a href="/forgot-password" class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-blue-600 hover:underline whitespace-nowrap">
              Forget?
            </a>
            @error('password')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-[#ff914d] border-gray-300 rounded focus:ring-[#ff914d]">
            <label for="remember" class="ml-2 text-sm text-gray-700">Remember me</label>
          </div>

          <button type="submit" id="submitBtn"
                  class="w-full bg-[#ff914d] text-white font-semibold rounded-lg py-3 text-lg hover:bg-[#ff7a1a] transition disabled:opacity-50 disabled:cursor-not-allowed">
            <span id="btnText">Sign In</span>
            <span id="btnLoader" class="hidden">
              <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            </span>
          </button>
        </form>

        <div class="flex items-center my-6 text-sm text-black">
          <hr class="flex-grow border-t border-black" />
          <span class="mx-3 font-medium">or continue</span>
          <hr class="flex-grow border-t border-black" />
        </div>

        <button type="button"
                class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-lg py-3 shadow-sm hover:shadow-md transition">
          <img src="{{ asset('assets/LogoGoogle-removebg-preview.png') }}" alt="google" class="w-5 h-5 object-contain" />
          Log in with Google
        </button>

        <p class="text-center mt-6 text-sm">
          Don't have an account?
          <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-semibold">Sign Up</a>
        </p>
      </div>
    </section>
  </main>

  <script>
    // Carousel functionality
    const images = [
      '{{ asset("assets/GitarBoy.jpg") }}',
      '{{ asset("assets/jeep.png") }}',
      '{{ asset("assets/Pantai.jpg") }}'
    ];
    
    const captions = [
      { title: 'Discover Amazing Places', subtitle: 'Start your healing journey today' },
      { title: 'Explore the World', subtitle: 'Create unforgettable memories' },
      { title: 'Find Your Peace', subtitle: 'Travel to heal your soul' }
    ];
    
    let currentIndex = 0;
    let autoplayInterval;
    
    function setCarousel(index) {
      if (index === currentIndex) return;
      
      const imgA = document.getElementById('imgA');
      const imgB = document.getElementById('imgB');
      const captionDiv = document.getElementById('carousel-caption');
      
      // Update dots
      document.querySelectorAll('[id^="dot-"]').forEach((dot, i) => {
        if (i === index) {
          dot.className = 'dot-active h-2 rounded-full transition-all duration-300 cursor-pointer hover:opacity-80';
        } else {
          dot.className = 'dot-inactive h-2 rounded-full transition-all duration-300 cursor-pointer hover:opacity-80';
        }
      });
      
      // Determine which image is currently visible
      const currentImg = imgA.style.opacity === '1' ? imgA : imgB;
      const nextImg = currentImg === imgA ? imgB : imgA;
      
      // Set next image
      nextImg.src = images[index];
      nextImg.style.transform = 'translateX(100%)';
      nextImg.style.opacity = '0';
      
      // Animate
      setTimeout(() => {
        currentImg.style.transform = 'translateX(-100%)';
        currentImg.style.opacity = '0';
        nextImg.style.transform = 'translateX(0)';
        nextImg.style.opacity = '1';
      }, 50);
      
      // Update caption
      captionDiv.innerHTML = `
        <h3 class="font-bold text-base mb-1 drop-shadow-lg">${captions[index].title}</h3>
        <p class="text-xs opacity-90 drop-shadow-md">${captions[index].subtitle}</p>
      `;
      
      currentIndex = index;
      
      // Reset autoplay
      resetAutoplay();
    }
    
    function nextSlide() {
      const next = (currentIndex + 1) % images.length;
      setCarousel(next);
    }
    
    function startAutoplay() {
      autoplayInterval = setInterval(nextSlide, 4000);
    }
    
    function resetAutoplay() {
      clearInterval(autoplayInterval);
      startAutoplay();
    }
    
    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
      startAutoplay();
    });
    
    // Pause on hover
    const carouselSection = document.querySelector('section');
    if (carouselSection) {
      carouselSection.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
      carouselSection.addEventListener('mouseleave', startAutoplay);
    }
    
    // Toggle password visibility (TIDAK DIUBAH)
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        `;
      } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
      }
    }

    // Form submit loading state (TIDAK DIUBAH)
    document.getElementById('loginForm').addEventListener('submit', function() {
      const submitBtn = document.getElementById('submitBtn');
      const btnText = document.getElementById('btnText');
      const btnLoader = document.getElementById('btnLoader');
      
      submitBtn.disabled = true;
      btnText.classList.add('hidden');
      btnLoader.classList.remove('hidden');
    });
  </script>
</body>
</html>