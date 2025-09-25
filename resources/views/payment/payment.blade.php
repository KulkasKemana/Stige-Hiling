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
        .main-content {
            padding: 120px 20px 40px;
            max-width: 500px;
            margin: 0 auto;
        }

        .page-title {
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 40px;
        }

        .payment-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #ecf0f1;
        }

        .payment-row:last-child {
            border-bottom: none;
            padding-top: 15px;
            font-weight: 600;
        }

        .payment-label {
            color: #2c3e50;
            font-size: 14px;
        }

        .payment-amount {
            color: #2c3e50;
            font-size: 14px;
            font-weight: 500;
        }

        .total-amount {
            color: #e67e22 !important;
            font-size: 16px !important;
            font-weight: 600 !important;
        }

        .method-title {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .payment-method {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ecf0f1;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            border-color: #3498db;
            background-color: #f8fafc;
        }

        .payment-method.expanded {
            background-color: #fff3cd;
            border-color: #ffc107;
        }

        .method-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
            margin-right: 15px;
        }

        .gopay { background-color: #00d4aa; }
        .virtual { background-color: #ff6b35; }
        .bca { background-color: #0066cc; }
        .bni { background-color: #fd7e00; }
        .mandiri { background-color: #1f4e79; }
        .cimb { background-color: #dc143c; }

        .method-info {
            flex: 1;
        }

        .method-name {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
        }

        .method-desc {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 2px;
        }

        .method-arrow {
            color: #bdc3c7;
            font-size: 18px;
        }
    </style>
</head>
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
<!-- main -->
        <div class="mt-3 text-center text-[11px] text-gray-400 py-1">Healing Tour & Travel</div>
      </div>
    </div>
  @endauth
  </header>
    <main class="main-content">
        <h1 class="page-title">Complete Your Payment</h1>
        
        <div class="payment-card">
            <div class="card-title">Summary Payment</div>
            <div class="payment-row">
                <span class="payment-label">Subtotal (3 Items)</span>
                <span class="payment-amount">Rp. 3.000.000</span>
            </div>
            <div class="payment-row">
                <span class="payment-label">Service Fee</span>
                <span class="payment-amount">Rp. 500.000</span>
            </div>
            <div class="payment-row">
                <span class="payment-label">Total Payment</span>
                <span class="payment-amount total-amount">Rp. 3.500.000</span>
            </div>
        </div>

        <div class="payment-card">
            <div class="method-title">Choose Payment Method</div>
            
            <div class="payment-methods">
                <div class="payment-method" onclick="toggleMethod(this)">
                    <div class="method-icon gopay">GP</div>
                    <div class="method-info">
                        <div class="method-name">E-wallet (GoPay, OVO, etc)</div>
                    </div>
                    <div class="method-arrow">›</div>
                </div>

                <div class="payment-method expanded" onclick="toggleMethod(this)">
                    <div class="method-icon virtual">VA</div>
                    <div class="method-info">
                        <div class="method-name">Virtual Account Transfer</div>
                        <div class="method-desc">Select bank to continue your payment</div>
                    </div>
                    <div class="method-arrow">∧</div>
                </div>

                <div class="payment-method" onclick="toggleMethod(this)">
                    <div class="method-icon bca">BCA</div>
                    <div class="method-info">
                        <div class="method-name">BCA Virtual Account</div>
                    </div>
                    <div class="method-arrow">›</div>
                </div>

                <div class="payment-method" onclick="toggleMethod(this)">
                    <div class="method-icon bni">BNI</div>
                    <div class="method-info">
                        <div class="method-name">BNI Virtual Account</div>
                    </div>
                    <div class="method-arrow">›</div>
                </div>

                <div class="payment-method" onclick="toggleMethod(this)">
                    <div class="method-icon mandiri">MDR</div>
                    <div class="method-info">
                        <div class="method-name">Mandiri Virtual Account</div>
                    </div>
                    <div class="method-arrow">›</div>
                </div>

                <div class="payment-method" onclick="toggleMethod(this)">
                    <div class="method-icon cimb">CNB</div>
                    <div class="method-info">
                        <div class="method-name">CIMB NIAGA Virtual Account</div>
                    </div>
                    <div class="method-arrow">›</div>
                </div>
            </div>
        </div>
    </main>

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