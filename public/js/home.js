function scrollCarousel(direction) {
  const carousel = document.getElementById('carouselItems');
  const card = carousel.querySelector('.carousel-card');
  const cardWidth = card.offsetWidth + 24; // 24 = space-x-6

if (direction === 1) {
  // Geser kanan, lalu rotasi DOM
  carousel.scrollBy({ left: cardWidth, behavior: 'smooth' });
  setTimeout(() => {
    const first = carousel.firstElementChild;
    carousel.appendChild(first);
    carousel.scrollLeft -= cardWidth;
    highlightCenterCard();
  }, 0); // waktu sesuai durasi animasi scroll
} else {
  // Rotasi DOM dulu, lalu geser kiri
  const last = carousel.lastElementChild;
  carousel.prepend(last);
  carousel.scrollLeft += cardWidth;
  carousel.scrollBy({ left: -cardWidth, behavior: 'smooth' });
  setTimeout(() => {
    highlightCenterCard();
  }, 0);
}

}

function highlightCenterCard() {
  const carousel = document.getElementById('carouselItems');
  const cards = carousel.querySelectorAll('.carousel-card');
  const carouselRect = carousel.getBoundingClientRect();
  let minDiff = Infinity;
  let centerIdx = 0;

  cards.forEach((card, idx) => {
    const cardRect = card.getBoundingClientRect();
    const cardCenter = cardRect.left + cardRect.width / 2;
    const carouselCenter = carouselRect.left + carouselRect.width / 2;
    const diff = Math.abs(carouselCenter - cardCenter);
    if (diff < minDiff) {
      minDiff = diff;
      centerIdx = idx;
    }
  });

  cards.forEach((card, idx) => {
    card.classList.remove('center', 'near-center', 'far');
    if (idx === centerIdx) {
      card.classList.add('center');
    } else if (idx === centerIdx - 1 || idx === centerIdx + 1) {
      card.classList.add('near-center');
    } else {
      card.classList.add('far');
    }
  });
}

  window.addEventListener('DOMContentLoaded', function() {
    highlightCenterCard();
    window.addEventListener('resize', highlightCenterCard);
  });

  // Event listener untuk tombol
  document.getElementById('prevBtn').onclick = function() { scrollCarousel(-1); };
  document.getElementById('nextBtn').onclick = function() { scrollCarousel(1); };