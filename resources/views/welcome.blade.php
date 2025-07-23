<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Healing Tour and Travel Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
  </style>
</head>
<body class="bg-[#f5f5f7] min-h-screen flex items-center justify-center p-6">
  <main class="bg-white rounded-[40px] shadow-[0_0_30px_rgba(0,0,0,0.15)] max-w-5xl w-full flex flex-col md:flex-row overflow-hidden">

    <!-- LEFT: Carousel -->
    <section class="md:w-1/2 w-full bg-white flex flex-col justify-center relative p-2 md:p-3">
      <div class="overflow-hidden rounded-tl-[24px] rounded-bl-[24px] rounded-br-[120px] relative w-full aspect-[3/4] shadow-md">
        <img id="imgA" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700" style="transform: translateX(0);" />
        <img id="imgB" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700" style="transform: translateX(100%);" />
        <div id="carousel-caption" class="absolute bottom-20 left-4 right-4 text-white font-semibold text-xs sm:text-sm leading-tight drop-shadow-[0_0_3px_rgba(0,0,0,0.8)]">
          <!-- caption here -->
        </div>
        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 flex space-x-1">
          <span onclick="setCarousel(0, true)" id="dot-0" class="cursor-pointer w-5 h-2 rounded-full bg-[#3b6dfd] transition"></span>
          <span onclick="setCarousel(1, true)" id="dot-1" class="cursor-pointer w-4 h-2 rounded-full bg-[#a9b3f7] transition"></span>
          <span onclick="setCarousel(2, true)" id="dot-2" class="cursor-pointer w-4 h-2 rounded-full bg-[#a9b3f7] transition"></span>
        </div>
      </div>
    </section>

    <!-- RIGHT: Login Form -->
    <section class="md:w-1/2 w-full p-10 md:p-14 flex flex-col justify-center">
      <div class="flex items-center space-x-3 mb-6">
        <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" alt="logo" class="w-10 h-10 object-contain" />
        <div class="text-sm font-bold leading-tight">
          Healing<br/>Tour And Travel
        </div>
      </div>
      <h1 class="text-2xl font-extrabold mb-2 leading-tight">WELCOME TO<br />HEALING TOUR AND TRAVEL</h1>
      <p class="text-sm mb-8">Please enter log in details below</p>
      <form class="w-full space-y-6">
        <input type="email" placeholder="Email" class="w-full border border-black rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none" required />
        <div class="relative">
          <input type="password" placeholder="Password" class="w-full border border-black rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none" required />
          <a href="#" class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-blue-600 hover:underline">Forget Password?</a>
        </div>
        <button type="submit" class="w-full bg-[#ff914d] text-white font-semibold rounded-lg py-3 text-lg hover:bg-[#ff7a1a] transition">Sign In</button>
      </form>
      <div class="flex items-center my-6 text-sm text-black">
        <hr class="flex-grow border-t border-black" />
        <span class="mx-3 font-medium">or continue</span>
        <hr class="flex-grow border-t border-black" />
      </div>
      <button type="button" class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-lg py-3 shadow-sm hover:shadow-md transition">
        <img src="{{ asset('assets/LogoGoogle-removebg-preview.png') }}" alt="google" class="w-5 h-5 object-contain" />
        Log in with Google
      </button>
      <p class="text-center mt-6 text-sm">
        Don’t have an account?
        <a href="#" class="text-blue-600 hover:underline">Sign Up</a>
      </p>
    </section>
  </main>

  <script>
    const images = [
      { src: "{{ asset('assets/GitarBoy.jpg') }}", caption: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." },
      { src: "{{ asset('assets/Gunung.jpg') }}", caption: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore" },
      { src: "{{ asset('assets/Pantai.jpg') }}", caption: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt" }
    ];

    const imgA = document.getElementById("imgA");
    const imgB = document.getElementById("imgB");
    const caption = document.getElementById("carousel-caption");
    let currentIdx = 0;
    let isCurrentA = true;
    let interval;

    function updateDots(idx) {
      for (let i = 0; i < images.length; i++) {
        const dot = document.getElementById(`dot-${i}`);
        dot.className = `cursor-pointer w-${i === idx ? '5' : '4'} h-2 rounded-full ${i === idx ? 'bg-[#3b6dfd]' : 'bg-[#a9b3f7]'} transition`;
      }
    }

    function setCarousel(idx, animate = false) {
      if (idx === currentIdx) return;

      const incoming = isCurrentA ? imgB : imgA;
      const outgoing = isCurrentA ? imgA : imgB;

      incoming.src = images[idx].src;

      if (!animate) {
        incoming.style.transition = "none";
        outgoing.style.transition = "none";
        incoming.style.transform = "translateX(0)";
        outgoing.style.transform = "translateX(100%)";
        caption.innerText = images[idx].caption;
        updateDots(idx);
        currentIdx = idx;
        return;
      }

      incoming.style.transition = "none";
      outgoing.style.transition = "none";
      incoming.style.transform = "translateX(100%)";
      outgoing.style.transform = "translateX(0)";
      caption.style.transition = "none";
      caption.style.opacity = 0;
      caption.style.transform = "translateX(100%)";
      incoming.offsetHeight;

      requestAnimationFrame(() => {
        incoming.style.transition = "transform 0.7s ease-in-out";
        outgoing.style.transition = "transform 0.7s ease-in-out";
        incoming.style.transform = "translateX(0)";
        outgoing.style.transform = "translateX(-100%)";

        caption.innerText = images[idx].caption;
        caption.style.transition = "transform 0.7s ease-in-out, opacity 0.7s ease-in-out";
        caption.style.transform = "translateX(0)";
        caption.style.opacity = 1;
      });

      setTimeout(() => {
        outgoing.style.transition = "none";
        outgoing.style.transform = "translateX(100%)";
        currentIdx = idx;
        isCurrentA = !isCurrentA;
        updateDots(idx);
      }, 700);
    }

    function startCarousel() {
      interval = setInterval(() => {
        const next = (currentIdx + 1) % images.length;
        setCarousel(next, true);
      }, 3500);
    }

    window.onload = () => {
      imgA.src = images[0].src;
      caption.innerText = images[0].caption;
      updateDots(0);
      startCarousel();
    };
  </script>
</body>
</html>
