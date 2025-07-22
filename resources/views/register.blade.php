<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Healing Tour and Travel Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
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
      <div class="relative w-full h-full">
        <img id="imgA" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700" style="z-index:0; transform: translateX(0);" />
        <img id="imgB" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700" style="z-index:0; transform: translateX(100%);" />
      </div>
      <div id="caption" class="absolute bottom-20 left-6 right-6 text-white font-semibold text-sm drop-shadow-[0_0_3px_rgba(0,0,0,0.8)] transition-all duration-700">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit
      </div>
      <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2">
        <span id="dot-0" onclick="setCarousel(0, true)" class="cursor-pointer w-6 sm:w-8 h-2 sm:h-3 rounded-full bg-[#3b6dfd]"></span>
        <span id="dot-1" onclick="setCarousel(1, true)" class="cursor-pointer w-4 sm:w-5 h-2 sm:h-3 rounded-full bg-[#a9b3f7]"></span>
        <span id="dot-2" onclick="setCarousel(2, true)" class="cursor-pointer w-4 sm:w-5 h-2 sm:h-3 rounded-full bg-[#a9b3f7]"></span>
      </div>
    </section>

    <!-- RIGHT: Register Form -->
    <section class="md:w-1/2 w-full p-10 md:p-14 flex flex-col justify-center">
      <div class="flex items-center space-x-3 mb-6">
        <img src="{{asset('assets/Logo_Healing_no_bg.png')}}" alt="logo" class="w-10 h-10 object-contain" />
        <div class="text-sm font-bold leading-tight">
          Healing<br/>Tour And Travel
        </div>
      </div>
      <h1 class="text-2xl font-extrabold mb-2 leading-tight">Create Your Account</h1>
      <p class="text-sm mb-8">Please fill in the form below to sign up</p>
      <form class="w-full space-y-6">
        <input type="text" placeholder="Name" class="w-full border border-black rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none" required />
        <input type="email" placeholder="Email" class="w-full border border-black rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none" required />
        <input type="password" placeholder="Password" class="w-full border border-black rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none" required />
        <button type="submit" class="w-full bg-[#ff914d] text-white font-semibold rounded-lg py-3 text-lg hover:bg-[#ff7a1a] transition">Sign Up</button>
      </form>
      <p class="text-center mt-6 text-sm">
        Already have an account?
        <a href="#" class="text-blue-600 hover:underline">Log in</a>
      </p>
    </section>
  </main>

  <!-- Script Carousel -->
  <script>
    const images = [
      {src: "{{asset('assets/GitarBoy.jpg')}}", caption: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore mit"},
      {src: "{{asset('assets/Gunung.jpg')}}", caption: "Lorem ipsum dolor"},
      {src: "{{asset('assets/Pantai.jpg')}}", caption: "Lorem ipsum dol"}
    ]

    const imgA = document.getElementById('imgA')
    const imgB = document.getElementById('imgB')
    const caption = document.getElementById('caption')

    let currentIdx = 0
    let isCurrentA = true
    let interval

    function updateDots(idx) {
      for (let i = 0; i < 3; i++) {
        const dot = document.getElementById(`dot-${i}`)
        dot.className = `cursor-pointer w-${i === idx ? '6 sm:w-8' : '4 sm:w-5'} h-2 sm:h-3 rounded-full ${i === idx ? 'bg-[#3b6dfd]' : 'bg-[#a9b3f7]'}`
      }
    }

    function setCarousel(idx, animate = false) {
      if (idx === currentIdx) return
      const nextImg = isCurrentA ? imgB : imgA
      const currentImg = isCurrentA ? imgA : imgB

      nextImg.src = images[idx].src
      nextImg.style.transition = 'none'
      nextImg.style.transform = 'translateX(100%)'
      caption.style.transition = 'none'
      caption.style.opacity = '0'
      caption.style.transform = 'translateX(100%)'

      nextImg.offsetWidth

      nextImg.style.transition = 'transform 0.7s'
      currentImg.style.transition = 'transform 0.7s'
      nextImg.style.transform = 'translateX(0)'
      currentImg.style.transform = 'translateX(-100%)'

      caption.innerText = images[idx].caption
      caption.style.transition = 'transform 0.7s, opacity 0.7s'
      caption.style.transform = 'translateX(0)'
      caption.style.opacity = '1'

      setTimeout(() => {
        currentImg.style.transition = 'none'
        currentImg.style.transform = 'translateX(100%)'
        isCurrentA = !isCurrentA
        currentIdx = idx
        updateDots(idx)
      }, 700)
    }

    function startCarousel() {
      interval = setInterval(() => {
        const next = (currentIdx + 1) % images.length
        setCarousel(next, true)
      }, 3500)
    }

    startCarousel()
    updateDots(0)
    imgA.src = images[0].src
    caption.innerText = images[0].caption
  </script>
</body>
</html>
