<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Healing Tour and Travel Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
</head>
<body class="bg-[#f5f5f7] min-h-screen flex items-center justify-center p-6">
  <main class="bg-white rounded-[40px] shadow-[0_0_30px_rgba(0,0,0,0.15)] max-w-5xl w-full flex flex-col md:flex-row overflow-hidden">
    <!-- LEFT: Carousel -->
    <section class="relative md:w-1/2 w-full rounded-t-[40px] md:rounded-l-[40px] md:rounded-tr-none overflow-hidden">
      <div id="carousel-container" class="relative w-full h-full">
        <img id="imgA" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 will-change-transform" style="z-index:0; transform: translateX(0);" />
        <img id="imgB" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 will-change-transform" style="z-index:0; transform: translateX(100%);" />
      </div>
      <div id="carousel-caption" class="absolute bottom-20 left-6 right-6 text-white font-semibold text-sm leading-tight drop-shadow-[0_0_3px_rgba(0,0,0,0.8)] will-change-transform will-change-opacity">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit
      </div>
      <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex justify-center space-x-2 px-4">
        <span onclick="setCarousel(0)" id="dot-0" class="cursor-pointer w-6 sm:w-8 h-2 sm:h-3 rounded-full bg-[#3b6dfd] transition"></span>
        <span onclick="setCarousel(1)" id="dot-1" class="cursor-pointer w-4 sm:w-5 h-2 sm:h-3 rounded-full bg-[#a9b3f7] transition"></span>
        <span onclick="setCarousel(2)" id="dot-2" class="cursor-pointer w-4 sm:w-5 h-2 sm:h-3 rounded-full bg-[#a9b3f7] transition"></span>
      </div>
    </section>

    <!-- RIGHT: Form -->
    <section class="md:w-1/2 w-full p-10 md:p-14 flex flex-col justify-center">
      <div class="flex items-center space-x-3 mb-6">
        <img src="{{asset('assets/Logo_Healing_no_bg.png')}}" alt="logo" class="w-10 h-10 object-contain" />
        <div class="text-sm font-bold leading-tight">
          Healing<br />Tour And Travel
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
        <img src="{{asset('assets/LogoGoogle-removebg-preview.png')}}" alt="google" class="w-5 h-5 object-contain" />
        Log in with Google
      </button>
      <p class="text-center mt-6 text-sm">
        Don’t have an account?
        <a href="#" class="text-blue-600 hover:underline">Sign Up</a>
      </p>
    </section>
  </main>

  <!-- Script Carousel -->
  <script>
    const images = [
      {src: "{{asset('assets/GitarBoy.jpg')}}", caption: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore mit"},
      {src: "{{asset('assets/Gunung.jpg')}}", caption: "Lorem ipsum dolor"},
      {src: "{{asset('assets/Pantai.jpg')}}", caption: "Lorem ipsum dol"}
    ];

    const imgA = document.getElementById("imgA");
    const imgB = document.getElementById("imgB");
    const caption = document.getElementById("carousel-caption");

    let currentIdx = 0;
    let isCurrentA = true;
    let carouselInterval;

    // preload
    images.forEach(i => {
      const preload = new Image();
      preload.src = i.src;
    });

    function setCarousel(idx, animate = false) {
      const imgIn = isCurrentA ? imgB : imgA;
      const imgOut = isCurrentA ? imgA : imgB;

      imgIn.src = images[idx].src;

      if (!animate) {
        imgIn.style.transition = "none";
        imgOut.style.transition = "none";
        imgIn.style.transform = "translateX(0)";
        imgOut.style.transform = "translateX(100%)";
        caption.innerText = images[idx].caption;
        updateDots(idx);
        currentIdx = idx;
        return;
      }

      imgIn.style.transition = "none";
      imgIn.style.transform = "translateX(100%)";
      imgOut.style.transition = "none";
      imgOut.style.transform = "translateX(0)";
      imgIn.offsetWidth;

      setTimeout(() => {
        imgIn.style.transition = "transform 0.7s ease";
        imgOut.style.transition = "transform 0.7s ease";
        imgIn.style.transform = "translateX(0)";
        imgOut.style.transform = "translateX(-100%)";

        caption.style.transition = "none";
        caption.style.transform = "translateX(100%)";
        caption.style.opacity = "0";
        caption.offsetWidth;
        caption.innerText = images[idx].caption;
        caption.style.transition = "transform 0.7s ease, opacity 0.7s ease";
        caption.style.transform = "translateX(0)";
        caption.style.opacity = "1";
      }, 10);

      setTimeout(() => {
        imgOut.style.transition = "none";
        imgOut.style.transform = "translateX(100%)";
        currentIdx = idx;
        updateDots(idx);
        isCurrentA = !isCurrentA;
      }, 700);
    }

    function updateDots(idx) {
      for (let i = 0; i < 3; i++) {
        const dot = document.getElementById(`dot-${i}`);
        dot.className = `cursor-pointer w-${i === idx ? '6 sm:w-8' : '4 sm:w-5'} h-2 sm:h-3 rounded-full bg-[${i === idx ? '#3b6dfd' : '#a9b3f7'}] transition`;
      }
    }

    function startCarousel() {
      carouselInterval = setInterval(() => {
        let nextIdx = (currentIdx + 1) % images.length;
        setCarousel(nextIdx, true);
      }, 3500);
    }

    document.querySelectorAll('[id^="dot-"]').forEach((dot, idx) => {
      dot.addEventListener("click", () => {
        setCarousel(idx, true);
        clearInterval(carouselInterval);
        startCarousel();
      });
    });

    // init
    imgA.src = images[0].src;
    caption.innerText = images[0].caption;
    updateDots(0);
    startCarousel();
  </script>
</body>
</html>
