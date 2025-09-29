document.addEventListener("DOMContentLoaded", () => {
  const images = [
    {
      src: "/assets/GitarBoy.jpg",  // ✅ Sudah sesuai
      caption:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...",
    },
    {
      src: "/assets/Gunung.jpg",  // ✅ Sudah sesuai
      caption:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore",
    },
    {
      src: "/assets/Pantai.jpg",  // ✅ Sudah sesuai
      caption:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
    },
  ];

  const imgA = document.getElementById("imgA");
  const imgB = document.getElementById("imgB");
  const caption = document.getElementById("carousel-caption");

  let currentIdx = 0;
  let isCurrentA = true;
  let isTransitioning = false;
  let interval;

  function updateDots(idx) {
    for (let i = 0; i < 3; i++) {
      const dot = document.getElementById(`dot-${i}`);
      dot.className = `cursor-pointer w-${i === idx ? "6 sm:w-8" : "4 sm:w-5"} h-2 sm:h-3 rounded-full ${
        i === idx ? "bg-[#3b6dfd]" : "bg-[#a9b3f7]"
      }`;
    }
  }

  function startCarousel() {
    interval = setInterval(() => {
      const next = (currentIdx + 1) % images.length;
      runTransition(next);
    }, 3500);
  }

  function resetCarouselTimerTo(idx) {
    clearInterval(interval);
    currentIdx = idx;
    updateDots(idx);
    imgA.src = images[idx].src;
    caption.innerText = images[idx].caption;
    isCurrentA = true;
    isTransitioning = false;
    startCarousel();
  }

  function runTransition(idx) {
    if (idx === currentIdx || isTransitioning) {
      resetCarouselTimerTo(currentIdx);
      return;
    }

    clearInterval(interval);
    isTransitioning = true;

    const nextImg = isCurrentA ? imgB : imgA;
    const currentImg = isCurrentA ? imgA : imgB;

    nextImg.src = images[idx].src;
    nextImg.style.transition = "none";
    nextImg.style.transform = "translateX(100%)";
    caption.style.transition = "none";
    caption.style.opacity = "0";
    caption.style.transform = "translateX(100%)";

    nextImg.offsetWidth;

    nextImg.style.transition = "transform 0.7s";
    currentImg.style.transition = "transform 0.7s";
    nextImg.style.transform = "translateX(0)";
    currentImg.style.transform = "translateX(-100%)";

    caption.innerText = images[idx].caption;
    caption.style.transition = "transform 0.7s, opacity 0.7s";
    caption.style.transform = "translateX(0)";
    caption.style.opacity = "1";

    setTimeout(() => {
      currentImg.style.transition = "none";
      currentImg.style.transform = "translateX(100%)";
      isCurrentA = !isCurrentA;
      currentIdx = idx;
      updateDots(idx);
      isTransitioning = false;
      startCarousel();
    }, 700);
  }

  // expose ke global
  window.setCarousel = runTransition;

  // init pertama
  startCarousel();
  updateDots(0);
  imgA.src = images[0].src;
  caption.innerText = images[0].caption;
});