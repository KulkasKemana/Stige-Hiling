<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment - Hasanah Tour and Travel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            min-height: 100vh;
            padding-bottom: 0;
        }

        .header {
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }

        .logo::before {
            content: "🕌";
            margin-right: 8px;
            font-size: 24px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #3498db;
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cart-icon, .user-icon {
            width: 24px;
            height: 24px;
            background-color: #95a5a6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            cursor: pointer;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #e74c3c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .header {
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }

        .logo::before {
            content: "🕌";
            margin-right: 8px;
            font-size: 24px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #3498db;
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cart-icon, .user-icon {
            width: 24px;
            height: 24px;
            background-color: #95a5a6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            cursor: pointer;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #e74c3c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
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

        .footer {
            background-color: #4a5568;
            padding: 15px 0;
            text-align: center;
            margin-top: 50px;
        }

        .footer-content {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .follow-section {
            position: absolute;
            right: 20px;
        }

        .copyright {
            color: #bdc3c7;
            font-size: 12px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 25px;
            height: 25px;
            background-color: #34495e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bdc3c7;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .social-icon:hover {
            background-color: #3498db;
            color: white;
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .main-content {
                padding: 20px 10px;
            }
            
            .payment-card {
                margin: 0 10px 25px;
            }
        }
    </style>
</head>
<body>
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
                <a href="/destinations" class="hover:underline transition-colors">Destinations</a>
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

            <!-- Profile dropdown -->
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
        </div>
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

    <footer class="footer">
        <div class="footer-content">
            <div class="copyright">Copyright © 2025 Healing Tour and Travel</div>
            <div class="follow-section">
                <div style="color: #bdc3c7; font-size: 12px; margin-bottom: 8px;">Follow Us</div>
                <div class="social-icons">
                    <div class="social-icon">📱</div>
                    <div class="social-icon">f</div>
                    <div class="social-icon">📧</div>
                    <div class="social-icon">🌐</div>
                </div>
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