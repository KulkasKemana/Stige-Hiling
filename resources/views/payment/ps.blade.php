<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #4a5568;
            min-height: 100vh;
            padding-top: 80px;
        }

        /* Header */
        .header {
            background-color: #333;
            color: white;
            padding: 0 20px;
            font-size: 14px;
            height: 30px;
            line-height: 30px;
        }

        /* Main Content */
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 200px);
            padding: 40px 20px;
        }

        .success-card {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
            position: relative;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background-color: #48bb78;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -60px auto 30px;
            box-shadow: 0 4px 12px rgba(72, 187, 120, 0.3);
        }

        .success-icon::after {
            content: '✓';
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        .success-title {
            font-size: 24px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
        }

        .success-message {
            color: #718096;
            font-size: 14px;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .amount {
            font-size: 28px;
            font-weight: 700;
            color: #ed8936;
            margin-bottom: 20px;
        }

        .transaction-id {
            color: #718096;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .email-info {
            color: #718096;
            font-size: 14px;
            margin-bottom: 40px;
            line-height: 1.5;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: #ed8936;
            color: white;
        }

        .btn-primary:hover {
            background-color: #dd7324;
        }

        .btn-secondary {
            background-color: white;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background-color: #f7fafc;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #4a5568;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .copyright {
            color: #a0aec0;
            font-size: 14px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            color: #a0aec0;
            font-size: 18px;
            text-decoration: none;
        }

        .follow-us {
            color: #a0aec0;
            font-size: 14px;
            margin-right: 15px;
        }

        @media (max-width: 768px) {
            .success-card {
                margin: 0 15px;
                padding: 30px 20px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .footer {
                flex-direction: column;
                gap: 10px;
                text-align: center;
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
        <div class="success-card">
            <div class="success-icon"></div>
            <h1 class="success-title">Payment Completed!!</h1>
            <p class="success-message">
                Thanks a lot We've received and<br>
                confirmed your order
            </p>
            <div class="amount">Rp. 5.500.000</div>
            <div class="transaction-id">Transaction ID : TRX-1A2B3C4D5E</div>
            <p class="email-info">
                We've sent your e-ticket and order details to your email.<br>
                Please check your inbox (or spam folder)
            </p>
            <div class="action-buttons">
                <a href="/home" class="btn btn-primary">Back to Home</a>
                <a href="/" class="btn btn-secondary">View My Schedule</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="copyright">
            Copyright © 2025 Healing Tour and Travel
        </div>
        <div style="display: flex; align-items: center;">
            <span class="follow-us">Follow Us</span>
            <div class="social-links">
                <a href="#">📘</a>
                <a href="#">📷</a>
                <a href="#">🐦</a>
                <a href="#">✉️</a>
            </div>
        </div>
    </footer>
</body>
</html>