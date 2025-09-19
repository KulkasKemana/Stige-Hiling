<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Travel Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
     font-family: "Inter", sans-serif;
   }
   @font-face {
     font-family: "Callisten";
     src: url("fonts/callisten.ttf") format("truetype");
   }
   @keyframes fadeInDown {
     from { opacity: 0; transform: translateY(-10px); }
     to   { opacity: 1; transform: translateY(0); }
   }
   .animate-fadeInDown {
     animation: fadeInDown 0.3s ease-out forwards;
   }
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
  #arrowButton.rotate {
    transform: rotate(180deg);
  }

  #arrowButton i {
    display: inline-block;
    transition: transform 220ms cubic-bezier(.2,.9,.2,1);
    transform: rotate(0deg);
    transform-origin: center;
  }
  #arrowButton.rotate i {
    transform: rotate(180deg);
  }
  </style>
 </head>
 <body class="bg-white pt-16">
  <!-- Navbar -->
  <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-3 relative">
  <!-- Left: Logo -->
  <div class="flex items-center gap-3">
    <img src="assets/Logo_Healing_no_bg.png" class="w-10 h-10 object-contain" width="40" height="40" alt="Logo" />
    <div class="text-[11px] leading-[14px]">
      <div class="font-semibold text-black">Healing</div>
      <div class="text-black">Tour And Travel</div>
    </div>
  </div>

  <!-- Center: Navigation -->
  <nav class="flex space-x-8 text-[14px] font-medium text-black">
    <a href="/home" class="hover:underline transition-colors">Home</a>
    <a href="#" class="hover:underline transition-colors">Schedule</a>
    <a href="/destinations" class="text-[#F97316] hover:underline transition-colors">Destinations</a>
  </nav>

  <!-- Right: User info -->
  <div class="flex items-center gap-3">
    <button id="profileButton" class="flex items-center gap-3 bg-transparent p-0 focus:outline-none">
      <img src="assets/Profile-Icon.png" class="w-8 h-8 rounded-full object-cover" width="32" height="32" />
      <div class="min-w-[120px] text-right">
        <div class="text-sm font-semibold">StigeHealing</div>
        <div class="text-xs text-gray-500">stigehealing@gmail.com</div>
      </div>
    </button>
    <button id="arrowButton" aria-label="Open user menu" class="bg-gray-100 w-9 h-9 rounded-full flex items-center justify-center ml-1 focus:outline-none hover:bg-gray-200 transition">
      <i class="fas fa-chevron-down text-gray-700 text-sm"></i>
    </button>
  </div>

  <!-- Profile dropdown (moved inside header so it follows the navbar) -->
  <div id="profileDropdown" class="absolute right-6 top-full mt-2 min-w-[300px] max-w-[360px] w-auto bg-white rounded-2xl shadow-lg z-50 hidden overflow-auto">
      <div class="p-3 flex flex-col">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200 flex-shrink-0">
            <img src="assets/profile-icon.png" alt="Profil" class="w-full h-full object-cover"/>
          </div>
          <div class="flex-1 min-w-0">
            <div class="text-sm font-semibold text-gray-900 truncate">StigeHealing</div>
            <div class="text-[11px] text-gray-500 truncate">stigehealing@gmail.com</div>
          </div>
        </div>

        <div class="flex items-center justify-between bg-gray-50 rounded-lg py-1.5 px-2 text-center text-xs mt-3">
          <div class="flex-1">
            <div class="font-semibold text-gray-700">0</div>
            <div class="text-gray-500">Points</div>
          </div>
          <div class="w-px h-6 bg-gray-200 mx-2"></div>
          <div class="flex-1">
            <div class="font-semibold text-gray-700">0</div>
            <div class="text-gray-500">Trips</div>
          </div>
          <div class="w-px h-6 bg-gray-200 mx-2"></div>
          <div class="flex-1">
            <div class="font-semibold text-gray-700">0</div>
            <div class="text-gray-500">Bucket</div>
          </div>
        </div>

        <nav class="mt-3 overflow-auto">
          <ul class="flex flex-col divide-y divide-gray-100 text-sm">
            <li>
              <a href="/profile" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="far fa-user text-gray-400 w-5 text-center"></i><span class="truncate">Profile</span></div>
                <i class="fas fa-chevron-right text-gray-400"></i>
              </a>
            </li>
            <li>
              <a href="/bookmark" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="far fa-bookmark text-gray-400 w-5 text-center"></i><span class="truncate">Bookmarked</span></div>
                <i class="fas fa-chevron-right text-gray-400"></i>
              </a>
            </li>
            <li>
              <a href="/keranjang" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="fas fa-shopping-cart text-gray-400 w-5 text-center"></i><span class="truncate">Keranjang</span></div>
                <i class="fas fa-chevron-right text-gray-400"></i>
              </a>
            </li>
            <li>
              <a href="/" class="flex items-center justify-between px-2 py-2 hover:bg-gray-50">
                <div class="flex items-center gap-3"><i class="fas fa-sign-out-alt text-gray-400 w-5 text-center"></i><span class="truncate">Log Out</span></div>
                <i class="fas fa-chevron-right text-gray-400"></i>
              </a>
            </li>
          </ul>
        </nav>

        <div class="mt-3 text-center text-[11px] text-gray-400 py-1">Healing Tour & Travel</div>
      </div>
    </div>
  </header>
  <!--- Main --->
  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 18px;
            margin-right: 15px;
            cursor: pointer;
            color: #666;
        }

        .title-section h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .location {
            color: #666;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .location::before {
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: "\f3c5";
            margin-right: 5px;
        }


        .main-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .left-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .image-gallery {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 10px;
            margin-bottom: 25px;
            height: 300px;
        }

        .main-image {
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><rect width="400" height="300" fill="%23e8c5a0"/><circle cx="200" cy="150" r="60" fill="%23d4a574"/><rect x="190" y="50" width="20" height="80" fill="%238b6f47"/><text x="200" y="250" text-anchor="middle" font-size="14" fill="%23654321">Masjid Haram</text></svg>') center/cover;
            border-radius: 8px;
            grid-row: span 2;
        }

        .small-image {
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 145"><rect width="200" height="145" fill="%23e8c5a0"/><circle cx="100" cy="72" r="30" fill="%23d4a574"/><rect x="95" y="30" width="10" height="40" fill="%238b6f47"/></svg>') center/cover;
            border-radius: 8px;
        }

        .description h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .description p {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 15px;
            line-height: 1.6;
            color: #000000ff;
            margin-bottom: 20px;
        }

        .facilities {
            margin-top: 30px;
        }

        .facilities h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .facility-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .facility-item {
            display: flex;
            align-items: center;
            padding: 8px 0;
            color: #666;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .facility-item i {
            margin-right: 8px;
            width: 16px;
        }

        .terms {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .terms h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .terms-list {
            list-style: none;
        }

        .terms-list li {
            display: flex;
            align-items: center;
            padding: 5px 0;
            color: #666;
            font-size: 14px;
        }

        .terms-list li i {
            margin-right: 8px;
            width: 16px;
        }

        .right-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .booking-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .rating-score {
            font-size: 24px;
            font-weight: 700;
            color: #f59e0b;
        }

        .stars {
            display: flex;
            gap: 2px;
        }

        .star {
            color: #f59e0b;
            font-size: 16px;
        }

        .price-info {
            margin: 20px 0;
        }

        .price {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .price-detail {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

        .book-btn {
            background: linear-gradient(135deg, #f59e0b, #f97316);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
            width: 100%;
            font-size: 16px;
        }

        .book-btn:hover {
            transform: translateY(-2px);
        }

        .reviews-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .reviews-header {
            margin-bottom: 25px;
        }

        .reviews-header h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .rating-overview {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .overall-rating {
            text-align: center;
        }

        .overall-score {
            font-size: 36px;
            font-weight: 700;
            color: #f59e0b;
        }

        .rating-breakdown {
            flex: 1;
        }

        .rating-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .rating-number {
            font-size: 14px;
            width: 15px;
        }

        .bar-container {
            flex: 1;
            background: #f3f4f6;
            border-radius: 4px;
            height: 6px;
        }

        .bar-fill {
            height: 100%;
            border-radius: 4px;
            background: #f59e0b;
        }

        .bar-count {
            font-size: 12px;
            color: #666;
            width: 30px;
            text-align: right;
        }

        .review-item {
            border-bottom: 1px solid #f3f4f6;
            padding: 20px 0;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .reviewer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .reviewer-details h4 {
            font-size: 14px;
            font-weight: 600;
        }

        .reviewer-details .date {
            font-size: 12px;
            color: #666;
        }

        .review-rating {
            display: flex;
            gap: 2px;
            margin-bottom: 8px;
        }

        .review-text {
            font-size: 14px;
            line-height: 1.5;
            color: #555;
        }

        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .image-gallery {
                grid-template-columns: 1fr 1fr;
                height: 250px;
            }

            .main-image {
                grid-column: span 2;
            }

            .facility-list {
                grid-template-columns: 1fr;
            }

            .rating-overview {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <button class="back-btn">←</button>
            <div class="title-section">
                <h1>Makkah - Masjidil Haram</h1>
                <div class="location">7.2 km • 5 days • Makkah Saudi Arabia</div>
            </div>
        </div>

        <div class="main-content">
            <div class="left-section">
                <div class="image-gallery">
                    <div class="main-image"></div>
                    <div class="small-image"></div>
                    <div class="small-image"></div>
                    <div class="small-image"></div>
                    <div class="small-image"></div>
                </div>

                <div class="description">
                    <h2>Description</h2>
                    <p>Masjid al-Haram adalah masjid terbesar di dunia dan merupakan tempat tersuci dalam Islam. Masjid ini mengelilingi Ka'bah, yang merupakan kiblat umat Islam di seluruh dunia. Setiap tahun, jutaan Muslim dari seluruh dunia berkunjung ke sini untuk menunaikan ibadah haji dan umrah serta melaksanakan ibadah dzikir lainnya.</p>
                </div>

                <div class="facilities">
                    <h3>Facility</h3>
                    <div class="facility-list">
                        <div class="facility-item"><i class="fas fa-bed"></i>5 Bedrooms</div>
                        <div class="facility-item"><i class="fas fa-bus"></i>Transportation</div>
                        <div class="facility-item"><i class="fas fa-utensils"></i>Breakfast</div>
                        <div class="facility-item"><i class="fas fa-map-marked-alt"></i>Tour</div>
                    </div>
                </div>

                <div class="terms">
                    <h3>Terms and Conditions Trip</h3>
                    <ul class="terms-list">
                        <li><i class="fas fa-clock"></i>Check-in from 2pm and check-out at 12pm</li>
                        <li><i class="fas fa-users"></i>Maximum 50 Person</li>
                    </ul>
                </div>
            </div>

            <div class="right-section">
                <div class="booking-card">
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 5px;">Makkah</h3>
                    <p style="color: #999; font-size: 14px; margin-bottom: 15px;">Saudi Arabia</p>
                    
                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                        <div style="width: 20px; height: 20px; border: 2px solid #666; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 8px;">
                            <div style="width: 6px; height: 6px; background: #666; border-radius: 50%;"></div>
                        </div>
                        <span style="color: #666; font-size: 14px;">
  <i class="fas fa-clock" style="margin-right: 5px;"></i> 2 days - 4 days
</span>

                    </div>

                    <div style="margin-bottom: 25px;">
                        <p style="color: #999; font-size: 12px; margin-bottom: 5px;">From</p>
                        <div style="font-size: 18px; font-weight: 700; color: #333;">Rp 5.000.000/Person</div>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <span style="color: #ffa500; font-size: 16px;">★</span>
                            <span style="font-weight: 600;">4.75</span>
                        </div>
                        <span style="color: #999; font-size: 12px;">419k Reviews</span>
                    </div>

                    <button class="book-btn">Book Now</button>
                    <div style="text-align: center; margin-top: 12px;">
                        <a href="#" style="color: #007bff; font-size: 14px; text-decoration: none;">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="reviews-section">
            <div class="reviews-header">
                <h2>Ratings and Reviews</h2>
                <p style="color: #666; font-size: 14px;">Here are reviews from recent travelers who give good ratings</p>
            </div>

            <div class="rating-overview">
                <div class="overall-rating">
                    <div class="overall-score">4.7</div>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">☆</span>
                    </div>
                    <div style="font-size: 12px; color: #666; margin-top: 5px;">182 reviews</div>
                </div>

                <div class="rating-breakdown">
                    <div class="rating-bar">
                        <span class="rating-number">5</span>
                        <div class="bar-container">
                            <div class="bar-fill" style="width: 70%"></div>
                        </div>
                        <span class="bar-count">128</span>
                    </div>
                    <div class="rating-bar">
                        <span class="rating-number">4</span>
                        <div class="bar-container">
                            <div class="bar-fill" style="width: 20%"></div>
                        </div>
                        <span class="bar-count">36</span>
                    </div>
                    <div class="rating-bar">
                        <span class="rating-number">3</span>
                        <div class="bar-container">
                            <div class="bar-fill" style="width: 8%"></div>
                        </div>
                        <span class="bar-count">15</span>
                    </div>
                    <div class="rating-bar">
                        <span class="rating-number">2</span>
                        <div class="bar-container">
                            <div class="bar-fill" style="width: 1%"></div>
                        </div>
                        <span class="bar-count">2</span>
                    </div>
                    <div class="rating-bar">
                        <span class="rating-number">1</span>
                        <div class="bar-container">
                            <div class="bar-fill" style="width: 0.5%"></div>
                        </div>
                        <span class="bar-count">1</span>
                    </div>
                </div>
            </div>

            <div class="review-item">
                <div class="reviewer-info">
                    <div class="reviewer-avatar">A</div>
                    <div class="reviewer-details">
                        <h4>Ahmad Subeki</h4>
                        <div class="date">3 days ago • Recommended</div>
                    </div>
                </div>
                <div class="review-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <div class="review-text">
                    Perjalanan yang sangat berkesan! Fasilitas yang disediakan sangat baik dan pelayanan guide yang ramah. Pengalaman spiritual yang tak terlupakan di Tanah Suci. Tempat yang sangat suci dan penuh berkah.
                </div>
            </div>

            <div class="review-item">
                <div class="reviewer-info">
                    <div class="reviewer-avatar">S</div>
                    <div class="reviewer-details">
                        <h4>Siti Aisyah</h4>
                        <div class="date">5 days ago • Recommended</div>
                    </div>
                </div>
                <div class="review-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">☆</span>
                </div>
                <div class="review-text">
                    Alhamdulillah, perjalanan umrah yang sangat lancar. Hotel dekat dengan Masjidil Haram, makanan halal dan enak. Terima kasih atas pelayanan yang memuaskan. Semoga bisa kembali lagi.
                </div>
            </div>

            <div class="review-item">
                <div class="reviewer-info">
                    <div class="reviewer-avatar">M</div>
                    <div class="reviewer-details">
                        <h4>Muhammad Ridho</h4>
                        <div class="date">1 week ago • Recommended</div>
                    </div>
                </div>
                <div class="review-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <div class="review-text">
                    Pengalaman yang luar biasa! Organisasi trip sangat baik, jadwal tersusun rapi, dan pembimbing sangat berpengalaman. Fasilitas hotel dan transportasi juga sangat nyaman. Highly recommended!
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple interactivity
        document.querySelector('.book-btn').addEventListener('click', function() {
            alert('Terima kasih! Anda akan diarahkan ke halaman booking.');
        });

        document.querySelector('.back-btn').addEventListener('click', function() {
            alert('Kembali ke halaman sebelumnya');
        });

        // Smooth scroll for mobile
        document.addEventListener('DOMContentLoaded', function() {
            const bookBtn = document.querySelector('.book-btn');
            bookBtn.addEventListener('click', function(e) {
                e.preventDefault();
                this.style.transform = 'translateY(-2px) scale(0.98)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-2px)';
                }, 150);
            });
        });
    </script>
</body>
</html>
<!-- Footer -->
  <footer class="bg-[#3B2F33] text-white w-full">
  <div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-10 md:gap-0">
      <div class="md:w-1/4 space-y-3">
        <div class="flex items-center space-x-2">
          <img class="w-8 h-8" height="32" src="assets/Logo_Healing_no_bg.png" width="32"/>
          <div class="text-xs leading-tight">
            <p class="font-semibold">Healing</p>
            <p>Tour And Travel</p>
          </div>
        </div>
        <p class="text-[10px] leading-tight max-w-[180px]">
          Kami berkomitmen untuk memberikan pengalaman healing journey terbaik yang akan mengubah hidup anda menuju kebahagiaan dan kedamaian.
        </p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Destinations</p>
        <p>Saudi Arabia</p>
        <p>Japan</p>
        <p>Bali</p>
        <p>France</p>
        <p>Italia</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Follow Us</p>
        <p class="flex items-center gap-2"><i class="fas fa-globe"></i>@healingtourandtravel</p>
        <p class="flex items-center gap-2"><i class="fab fa-twitter"></i>@healingtourandtravel</p>
        <p class="flex items-center gap-2"><i class="fas fa-phone-alt"></i>+62 8909 9897 3563</p>
        <p class="flex items-center gap-2"><i class="fas fa-envelope"></i>healing@gmail.com</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Company</p>
        <p>About Us</p>
        <p>Partners</p>
      </div>

      <div class="md:w-1/5 text-[10px] leading-tight space-y-1">
        <p class="font-semibold text-xs mb-2">Help</p>
        <p>Help Center</p>
        <p>FAQ</p>
        <p>Terms &amp; Conditions</p>
        <p>Privacy Policy</p>
      </div>
    </div>

    <div class="mt-10 border-t border-[#5A4E50] pt-4 text-[10px] text-center">
      Copyright © 2025 Healing Tour and Travel
    </div>

    <div class="flex justify-end mt-4">
      <a aria-label="WhatsApp" href="https://wa.me/62890998973563" target="_blank" rel="noopener noreferrer" class="bg-[#25D366] w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-[#1ebe57] transition-colors duration-300">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
      </a>
    </div>
  </div>
</footer>
  <!-- script dropdown profile -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('profileButton');
    const arrowButton = document.getElementById('arrowButton');
    const profileDropdown = document.getElementById('profileDropdown');
    if (!profileDropdown) return;

    function onAnimationEnd(e) {
      if (e.target !== profileDropdown) return;
      if (profileDropdown.classList.contains('popup-animate-out')) {
        profileDropdown.classList.remove('popup-animate-out');
        profileDropdown.classList.add('hidden');
      } else if (profileDropdown.classList.contains('popup-animate-in')) {
        profileDropdown.classList.remove('popup-animate-in');
      }
    }

    profileDropdown.addEventListener('animationend', onAnimationEnd);

    function openDropdown(evt) {
      evt?.stopPropagation();
      profileDropdown.classList.remove('hidden');
      profileDropdown.classList.add('show');
      // restart animation
      profileDropdown.classList.remove('popup-animate-out');
      // force reflow
      void profileDropdown.offsetWidth;
      profileDropdown.classList.add('popup-animate-in');
      arrowButton?.classList.add('rotate');
    }

    function closeDropdown(evt) {
      evt?.stopPropagation();
      profileDropdown.classList.remove('popup-animate-in');
      profileDropdown.classList.remove('show');
      // start out animation; animationend will add hidden
      profileDropdown.classList.add('popup-animate-out');
      arrowButton?.classList.remove('rotate');
    }

    function toggleDropdown(e) {
      e?.stopPropagation();
      if (profileDropdown.classList.contains('hidden')) openDropdown(e); else closeDropdown(e);
    }

    profileButton?.addEventListener('click', toggleDropdown);
    arrowButton?.addEventListener('click', toggleDropdown);

    // keep clicks inside dropdown from closing it
    profileDropdown.addEventListener('click', function (e) { e.stopPropagation(); });

    // click outside closes dropdown
    window.addEventListener('click', function (event) {
      if (!profileDropdown.classList.contains('hidden')) {
        if (!profileButton?.contains(event.target) && !arrowButton?.contains(event.target) && !profileDropdown.contains(event.target)) {
          closeDropdown();
        }
      }
    });
  });
</script>
</body>
</html>