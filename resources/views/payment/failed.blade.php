<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed - Healing Tour and Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #4a5568;
            min-height: 100vh;
            padding-top: 80px;
        }
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
            background-color: #e53e3e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -60px auto 30px;
            box-shadow: 0 4px 12px rgba(229, 62, 62, 0.3);
        }
        .success-icon::after {
            content: '✕';
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
            flex-wrap: wrap;
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
    </style>
</head>
<body>
    @include('partials.navbar')

    <main class="main-content">
        <div class="success-card">
            <div class="success-icon"></div>
            <h1 class="success-title">Oops, Your Payment Didn't Go Through</h1>
            <p class="success-message">
                Unfortunately, we couldn't process your payment.<br>
                Please try again or contact our support team.
            </p>
            
            @if(session('booking_code'))
                <div class="transaction-id">Transaction ID : {{ session('booking_code') }}</div>
            @endif
            
            <p class="email-info">
                Don't worry! You can retry the payment or choose a different payment method.<br>
                If you need assistance, our support team is here to help.
            </p>
            
            <div class="action-buttons">
                <a href="{{ route('cart.index') }}" class="btn btn-primary">Retry Payment</a>
                <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-secondary">
                    <i class="fab fa-whatsapp mr-1"></i> Need Help?
                </a>
            </div>

            <!-- Possible Reasons -->
            <div class="mt-8 bg-red-50 rounded-lg p-4 text-left">
                <p class="text-sm font-semibold text-red-900 mb-2">Possible Reasons:</p>
                <ul class="text-xs text-red-700 space-y-1 list-disc list-inside">
                    <li>Insufficient balance in your account</li>
                    <li>Payment timeout or network error</li>
                    <li>Incorrect payment details</li>
                    <li>Bank system maintenance</li>
                </ul>
            </div>
        </div>
    </main>

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

</body>
</html>