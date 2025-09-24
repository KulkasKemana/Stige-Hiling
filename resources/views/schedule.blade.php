<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hajiya Travel & Tours</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            padding-top: 70px; /* Add padding for fixed header */
        }

        /* Header styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 40;
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 24px;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #10b981, #059669);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .logo-text {
            font-size: 11px;
            line-height: 14px;
        }

        .logo-text .brand-name {
            font-weight: 600;
            color: black;
        }

        .logo-text .brand-sub {
            color: black;
        }

        .nav-menu {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .nav-menu a {
            text-decoration: none;
            color: black;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-menu a:hover {
            text-decoration: underline;
        }

        .nav-menu a.active {
            color: #10b981;
            text-decoration: underline;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-button {
            display: flex;
            align-items: center;
            gap: 12px;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(45deg, #10b981, #059669);
        }

        .profile-info {
            text-align: right;
            min-width: 120px;
        }

        .profile-name {
            font-size: 14px;
            font-weight: 600;
        }

        .profile-email {
            font-size: 12px;
            color: #6b7280;
        }

        .arrow-button {
            background: #f3f4f6;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 4px;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .arrow-button:hover {
            background: #e5e7eb;
        }

        .profile-dropdown {
            position: absolute;
            right: 24px;
            top: 100%;
            margin-top: 8px;
            min-width: 300px;
            max-width: 360px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            z-index: 50;
            display: none;
            overflow: hidden;
        }

        .dropdown-content {
            padding: 12px;
            display: flex;
            flex-direction: column;
        }

        .dropdown-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dropdown-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            flex-shrink: 0;
            background: linear-gradient(45deg, #10b981, #059669);
        }

        .dropdown-user-info {
            flex: 1;
            min-width: 0;
        }

        .dropdown-user-name {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dropdown-user-email {
            font-size: 11px;
            color: #6b7280;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stats-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f9fafb;
            border-radius: 8px;
            padding: 6px 8px;
            text-align: center;
            font-size: 12px;
            margin-top: 12px;
        }

        .stat-item {
            flex: 1;
        }

        .stat-value {
            font-weight: 600;
            color: #374151;
        }

        .stat-label {
            color: #6b7280;
        }

        .stat-divider {
            width: 1px;
            height: 24px;
            background: #d1d5db;
            margin: 0 8px;
        }

        .dropdown-nav {
            margin-top: 12px;
        }

        .dropdown-nav ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            font-size: 14px;
        }

        .dropdown-nav li {
            border-bottom: 1px solid #f3f4f6;
        }

        .dropdown-nav li:last-child {
            border-bottom: none;
        }

        .dropdown-nav a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px;
            text-decoration: none;
            color: #374151;
            transition: background 0.2s;
        }

        .dropdown-nav a:hover {
            background: #f9fafb;
        }

        .nav-item-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item-left i {
            color: #9ca3af;
            width: 20px;
            text-align: center;
        }

        .dropdown-footer {
            margin-top: 12px;
            text-align: center;
            font-size: 11px;
            color: #9ca3af;
            padding: 4px;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #10b981;
        }

        .page-subtitle {
            color: #666;
            margin-bottom: 30px;
        }

        .booking-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
            display: flex;
            position: relative;
        }

        .booking-image {
            width: 350px;
            height: 150px;
            position: relative;
            overflow: hidden;
        }

        .booking-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .booking-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(16, 185, 129, 0.8), rgba(5, 150, 105, 0.8));
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            color: white;
        }

        .destination-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .travel-date {
            font-size: 14px;
            opacity: 0.9;
        }

        .booking-logo {
            position: absolute;
            bottom: 15px;
            left: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
        }

        .booking-logo-icon {
            width: 25px;
            height: 25px;
            background: white;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #10b981;
            font-weight: bold;
            font-size: 12px;
        }

        .booking-details {
            flex: 1;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .show-details-btn {
            background: #10b981;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .show-details-btn:hover {
            background: #059669;
        }

        /* Kyoto specific styling */
        .kyoto-card .booking-overlay {
            background: linear-gradient(45deg, rgba(255, 107, 53, 0.8), rgba(255, 140, 66, 0.8));
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 40px 0 20px;
            margin-top: 80px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            padding: 0 20px;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            color: #10b981;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 8px;
            cursor: pointer;
        }

        .footer-section ul li:hover {
            color: #10b981;
        }

        .footer-description {
            line-height: 1.6;
            color: #bdc3c7;
        }

        .footer-bottom {
            border-top: 1px solid #34495e;
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            color: #95a5a6;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-icon {
            width: 35px;
            height: 35px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .social-icon:hover {
            background: #059669;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <!-- Left: Logo -->
            <div class="logo">
                <div class="logo-icon">H</div>
                <div class="logo-text">
                    <div class="brand-name">Healing</div>
                    <div class="brand-sub">Tour And Travel</div>
                </div>
            </div>

            <!-- Center: Navigation -->
            <nav>
                <ul class="nav-menu">
                    <li><a href="/home">Home</a></li>
                    <li><a href="#" class="active">Schedule</a></li>
                    <li><a href="/destinations">Destinations</a></li>
                </ul>
            </nav>

            <!-- Right: User info -->
            <div class="user-profile">
                <button id="profileButton" class="profile-button">
                    <div class="profile-avatar"></div>
                    <div class="profile-info">
                        <div class="profile-name">StigeHealing</div>
                        <div class="profile-email">stigehealing@gmail.com</div>
                    </div>
                </button>
                <button id="arrowButton" class="arrow-button" aria-label="Open user menu">
                    <i class="fas fa-chevron-down text-gray-700 text-sm"></i>
                </button>
            </div>

            <!-- Profile dropdown -->
            <div id="profileDropdown" class="profile-dropdown">
                <div class="dropdown-content">
                    <div class="dropdown-profile">
                        <div class="dropdown-avatar"></div>
                        <div class="dropdown-user-info">
                            <div class="dropdown-user-name">StigeHealing</div>
                            <div class="dropdown-user-email">stigehealing@gmail.com</div>
                        </div>
                    </div>

                    <div class="stats-row">
                        <div class="stat-item">
                            <div class="stat-value">0</div>
                            <div class="stat-label">Points</div>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <div class="stat-value">0</div>
                            <div class="stat-label">Trips</div>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <div class="stat-value">0</div>
                            <div class="stat-label">Bucket</div>
                        </div>
                    </div>

                    <nav class="dropdown-nav">
                        <ul>
                            <li>
                                <a href="/profile">
                                    <div class="nav-item-left">
                                        <i class="far fa-user"></i>
                                        <span>Profile</span>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/bookmark">
                                    <div class="nav-item-left">
                                        <i class="far fa-bookmark"></i>
                                        <span>Bookmarked</span>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/">
                                    <div class="nav-item-left">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Log Out</span>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="dropdown-footer">Healing Tour & Travel</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <h1 class="page-title">Your Schedule</h1>
        <p class="page-subtitle">All active booking tickets</p>

        <!-- Kyoto Booking Card -->
        <div class="booking-card kyoto-card">
            <div class="booking-image">
                <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?w=500&h=300&fit=crop" alt="Kyoto Japan">
                <div class="booking-overlay">
                    <div class="destination-name">Kyoto • Japan</div>
                    <div class="travel-date">15 October 2024</div>
                    <div class="booking-logo">
                        <div class="booking-logo-icon">H</div>
                        <div>
                            <div style="font-size: 12px; font-weight: bold;">Healing</div>
                            <div style="font-size: 10px;">Tour And Travel</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booking-details">
                <button class="show-details-btn" onclick="showBookingDetails('kyoto')">Show Details</button>
            </div>
        </div>

        <!-- Makkah Booking Card -->
        <div class="booking-card">
            <div class="booking-image">
                <img src="https://images.unsplash.com/photo-1564769662533-4f00a87b4056?w=500&h=300&fit=crop" alt="Makkah Saudi Arabia">
                <div class="booking-overlay">
                    <div class="destination-name">Makkah • Saudi Arabia</div>
                    <div class="travel-date">19 October 2024</div>
                    <div class="booking-logo">
                        <div class="booking-logo-icon">H</div>
                        <div>
                            <div style="font-size: 12px; font-weight: bold;">Healing</div>
                            <div style="font-size: 10px;">Tour And Travel</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booking-details">
                <button class="show-details-btn" onclick="showBookingDetails('makkah')">Show Details</button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Healing</h3>
                <p class="footer-description">
                    Your trusted partner for spiritual journeys and cultural exploration. 
                    We specialize in Hajj, Umrah, and premium travel experiences across the globe.
                </p>
                <div class="social-icons">
                    <div class="social-icon">f</div>
                    <div class="social-icon">t</div>
                    <div class="social-icon">i</div>
                    <div class="social-icon">y</div>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Destinations</h3>
                <ul>
                    <li>Saudi Arabia</li>
                    <li>Japan</li>
                    <li>Turkey</li>
                    <li>Egypt</li>
                    <li>Morocco</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Follow Us</h3>
                <ul>
                    <li>@healingtraveltours</li>
                    <li>@healing_official</li>
                    <li>@healing-travel-tours</li>
                    <li>Healing Tour & Travel</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Company</h3>
                <ul>
                    <li>About Us</li>
                    <li>Partners</li>
                </ul>
                <h3 style="margin-top: 20px;">Help</h3>
                <ul>
                    <li>Support</li>
                    <li>FAQ</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            © 2024 Healing Tour And Travel. All rights reserved.
        </div>
    </footer>

    <script>
        // Profile dropdown functionality
        const profileButton = document.getElementById('profileButton');
        const arrowButton = document.getElementById('arrowButton');
        const profileDropdown = document.getElementById('profileDropdown');

        function toggleDropdown() {
            if (profileDropdown.style.display === 'none' || profileDropdown.style.display === '') {
                profileDropdown.style.display = 'block';
            } else {
                profileDropdown.style.display = 'none';
            }
        }

        profileButton.addEventListener('click', toggleDropdown);
        arrowButton.addEventListener('click', toggleDropdown);

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!profileButton.contains(event.target) && !arrowButton.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.style.display = 'none';
            }
        });

        function showBookingDetails(destination) {
            if (destination === 'kyoto') {
                alert('Kyoto, Japan Booking Details:\n\nDeparture: 15 October 2024\nDuration: 7 days\nPackage: Cultural Heritage Tour\nStatus: Confirmed\n\nIncludes:\n• Round-trip flights\n• 4-star hotel accommodation\n• Guided temple tours\n• Traditional tea ceremony\n• Cherry blossom viewing');
            } else if (destination === 'makkah') {
                alert('Makkah, Saudi Arabia Booking Details:\n\nDeparture: 19 October 2024\nDuration: 14 days\nPackage: Hajj Pilgrimage\nStatus: Confirmed\n\nIncludes:\n• Round-trip flights\n• 5-star hotel near Haram\n• Guided religious tours\n• Meals (Halal)\n• Transportation to holy sites');
            }
        }

        // Add some interactive effects
        document.querySelectorAll('.show-details-btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });

        // Add hover effect to booking cards
        document.querySelectorAll('.booking-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 8px 25px rgba(0,0,0,0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
            });
        });
    </script>
</body>
</html>