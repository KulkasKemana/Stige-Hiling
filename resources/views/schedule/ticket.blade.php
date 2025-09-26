<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment - Healing Tour and Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
     font-family: "Inter", sans-serif;
     background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            min-height: 100vh;
            padding-bottom: 0;
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
        .header {
            display: flex;
            align-items: center;
            color: white;
            margin-bottom: 40px;
            font-size: 18px;
            font-weight: 500;
        }

        .back-arrow {
            margin-right: 12px;
            font-size: 24px;
            cursor: pointer;
        }

        .ticket-container {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .ticket-header {
            padding: 24px 24px 20px 24px;
            position: relative;
        }

        .logo-section {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
        }

        .logo {
            width: 40px;
            height: 40px;
            background: #f0f0f0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-weight: bold;
            font-size: 12px;
            color: #333;
        }

        .destination {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 24px;
        }

        .ticket-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .order-id {
            background: #ffd700;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .ticket-count {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .ticket-icon {
            width: 16px;
            height: 16px;
            background: #666;
            border-radius: 2px;
        }

        .perforated-border {
            height: 20px;
            background: repeating-linear-gradient(
                90deg,
                transparent,
                transparent 10px,
                #ddd 10px,
                #ddd 15px
            );
            position: relative;
        }

        .perforated-border::before,
        .perforated-border::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            border-radius: 50%;
            top: 0;
        }

        .perforated-border::before {
            left: -10px;
        }

        .perforated-border::after {
            right: -10px;
        }

        .qr-section {
            padding: 24px;
            text-align: center;
            background: #fafafa;
        }

        .qr-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
        }

        .qr-code {
            width: 120px;
            height: 120px;
            background: white;
            border: 2px solid #eee;
            border-radius: 8px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .qr-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .ticket-container {
                max-width: 100%;
            }
            
            .header {
                font-size: 16px;
            }
        }
    </style>
</head>
<!-- Navbar -->
  <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-3 relative">
  <!-- Left: Logo -->
  <div class="flex items-center gap-3">
    <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" class="w-10 h-10 object-contain" width="40" height="40" alt="Logo" />
    <div class="text-[11px] leading-[14px]">
      <div class="font-semibold text-black">Healing</div>
      <div class="text-black">Tour And Travel</div>
    </div>
  </div>

  <!-- Center: Navigation -->
  <nav class="flex space-x-8 text-[14px] font-medium text-black">
    <a href="/home" class="hover:underline transition-colors">Home</a>
    <a href="/schedule" class="hover:underline transition-colors">Schedule</a>
    <a href="/destinations" class="hover:underline transition-colors">Destinations</a>
  </nav>

  <!-- Right: User info -->
  <div class="flex items-center gap-3">
    @auth
      <button id="profileButton" class="flex items-center gap-3 bg-transparent p-0 focus:outline-none">
        <img src="assets/Profile-Icon.png" class="w-8 h-8 rounded-full object-cover" width="32" height="32" />
        <div class="min-w-[120px] text-right">
          <div class="text-sm font-semibold">{{ Auth::user()->name }}</div>
          <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
        </div>
      </button>
      <button id="arrowButton" aria-label="Open user menu" class="bg-gray-100 w-9 h-9 rounded-full flex items-center justify-center ml-1 focus:outline-none hover:bg-gray-200 transition">
        <i class="fas fa-chevron-down text-gray-700 text-sm"></i>
      </button>
    @else
      <a href="/login" class="text-sm font-medium text-gray-700 hover:text-orange-500 transition-colors">Login</a>
      <a href="/register" class="ml-4 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition-colors">Register</a>
    @endauth
  </div>

  <!-- Profile dropdown (only shown when authenticated) -->
  @auth
    <div id="profileDropdown" class="absolute right-6 top-full mt-2 min-w-[300px] max-w-[360px] w-auto bg-white rounded-2xl shadow-lg z-50 hidden overflow-auto">
      <div class="p-3 flex flex-col">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200 flex-shrink-0">
            <img src="assets/profile-icon.png" alt="Profil" class="w-full h-full object-cover"/>
          </div>
          <div class="flex-1 min-w-0">
            <div class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</div>
            <div class="text-[11px] text-gray-500 truncate">{{ Auth::user()->emil }}</div>
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
        @endauth
<!-- main -->
  </header>
    <body>
    <div class="header">
        <span class="back-arrow">←</span>
        <span>Ticket Details</span>
    </div>

    <div class="ticket-container">
        <div class="ticket-header">
            <div class="logo-section">
                <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" class="w-10 h-10 object-contain" width="40" height="40" alt="Logo" />
                <div>
                    <div style="font-size: 12px; color: #666;">Healing</div>
                    <div style="font-size: 12px; color: #666;">Tour And Travel</div>
                </div>
            </div>
            
            <div class="destination">Kyoto - Japan</div>
            
            <div class="ticket-info">
                <div class="info-item">
                    <div class="info-label">Order ID</div>
                    <div class="info-value">
                        <span class="order-id">ORDER 12345</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Entry Date</div>
                    <div class="info-value">25 July 2025</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Visitor</div>
                    <div class="info-value">Stige</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Ticket</div>
                    <div class="info-value">
                        <div class="ticket-count">
                            <i class="fas fa-ticket-alt text-gray-600"></i>
                            <span>1x</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="perforated-border"></div>

        <div class="qr-section">
            <div class="qr-title">Scan the QR Code</div>
            <div class="qr-code">
                <img src="{{ asset('assets/qrcode.png') }}" 
                     alt="QR Code" 
                     class="qr-image"
                     onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=&quot;color: #999; font-size: 12px; text-align: center;&quot;>QR Code<br>Image not found<br><small>Please add qrcode.jpg to folder</small></div>'">
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="mt-10 border-t border-[#989898] text-gray-300 py-4">
  <div class="container mx-auto flex items-center justify-between">
    <div class="w-1/3"></div>

    <!-- copyright -->
    <div class="w-1/3 text-center text-sm">
      Copyright © 2025 Healing Tour and Travel
    </div>

    <!-- follow us -->
    <div class="w-1/3 flex justify-end items-center space-x-3 text-sm">
      <span class="font-semibold">Follow Us</span>
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-whatsapp"></i></a>
      <a href="#"><i class="far fa-envelope"></i></a>
    </div>
  </div>
</footer>
    <script>
        // Profile dropdown functionality
        const profileButton = document.getElementById('profileButton');
        const arrowButton = document.getElementById('arrowButton');
        const profileDropdown = document.getElementById('profileDropdown');

        function toggleDropdown() {
            profileDropdown.classList.toggle('hidden');
        }

        profileButton.addEventListener('click', toggleDropdown);
        arrowButton.addEventListener('click', toggleDropdown);

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideProfile = profileButton.contains(event.target) || 
                                       arrowButton.contains(event.target) || 
                                       profileDropdown.contains(event.target);
            
            if (!isClickInsideProfile && !profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
            }
        });

        function toggleMethod(element) {
            // Remove expanded class from all methods
            const allMethods = document.querySelectorAll('.payment-method');
            allMethods.forEach(method => {
                method.classList.remove('expanded');
                const arrow = method.querySelector('.method-arrow');
                arrow.textContent = '›';
            });
            
            // Add expanded class to clicked method
            element.classList.add('expanded');
            const arrow = element.querySelector('.method-arrow');
            arrow.textContent = '∧';
        }

        // Add some interactive hover effects
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            });
            
            method.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>