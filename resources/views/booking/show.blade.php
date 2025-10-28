<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details - Healing Tour and Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            min-height: 100vh;
            padding-bottom: 40px;
        }
        .header {
            display: flex;
            align-items: center;
            color: white;
            margin-bottom: 40px;
            font-size: 18px;
            font-weight: 500;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        .back-arrow {
            margin-right: 12px;
            font-size: 24px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .back-arrow:hover {
            transform: translateX(-4px);
        }
        .ticket-container {
            max-width: 400px;
            margin: 0 auto 40px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .ticket-header {
            padding: 24px 24px 20px 24px;
            position: relative;
        }
        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
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
            font-size: 11px;
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
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .perforated-border {
            height: 20px;
            background: repeating-linear-gradient(90deg, transparent, transparent 10px, #ddd 10px, #ddd 15px);
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
        .perforated-border::before { left: -10px; }
        .perforated-border::after { right: -10px; }
        .qr-section {
            padding: 24px;
            text-align: center;
            background: #fafafa;
        }
        .qr-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
            font-weight: 500;
        }
        .qr-code {
            width: 140px;
            height: 140px;
            background: white;
            border: 2px solid #eee;
            border-radius: 12px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body class="pt-24">

    @include('partials.navbar')

    <div class="max-w-7xl mx-auto px-6">
        <div class="header">
            <a href="{{ route('booking.index') }}" class="back-arrow">←</a>
            <span>Ticket Details</span>
        </div>

        @if(isset($bookings) && $bookings->count() > 0)
            @foreach($bookings as $booking)
            <div class="ticket-container">
                <div class="ticket-header">
                    <div class="logo-section">
                        <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" 
                             class="w-10 h-10 object-contain" 
                             alt="Logo" />
                        <div>
                            <div style="font-size: 12px; font-weight: 600; color: #333;">Healing</div>
                            <div style="font-size: 11px; color: #666;">Tour And Travel</div>
                        </div>
                    </div>
                    
                    <div class="destination">{{ $booking->destination->name ?? 'Destination' }}</div>
                    
                    <div class="ticket-info">
                        <div class="info-item">
                            <div class="info-label">Order ID</div>
                            <div class="info-value">
                                <span class="order-id">{{ $booking->booking_code }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Travel Date</div>
                            <div class="info-value">
                                {{ $booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('d M Y') : 'TBA' }}
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Visitor Name</div>
                            <div class="info-value">{{ $booking->name ?? Auth::user()->name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Tickets</div>
                            <div class="info-value">
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-ticket-alt text-gray-600 text-xs"></i>
                                    <span>{{ $booking->quantity ?? 1 }}x</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Total Price</div>
                            <div class="info-value text-orange-600">
                                Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Status</div>
                            <div class="info-value">
                                @if($booking->payment_status === 'paid')
                                    <span class="text-green-600 text-xs">✓ Paid</span>
                                @else
                                    <span class="text-yellow-600 text-xs">⏱ Pending</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="perforated-border"></div>

                <div class="qr-section">
                    <div class="qr-title">Scan QR Code for Check-in</div>
                    <div class="qr-code">
                        @if(file_exists(public_path('assets/qrcode.png')))
                            <img src="{{ asset('assets/qrcode.png') }}" alt="QR Code">
                        @else
                            <div class="text-center p-4">
                                <i class="fas fa-qrcode text-4xl text-gray-300 mb-2"></i>
                                <p class="text-xs text-gray-500">QR Code</p>
                                <p class="text-xs text-gray-400">{{ $booking->booking_code }}</p>
                            </div>
                        @endif
                    </div>
                    <p class="text-xs text-gray-500 mt-4">Show this ticket at the check-in counter</p>
                </div>
            </div>
            @endforeach
        @else
            <div class="ticket-container">
                <div class="p-8 text-center">
                    <i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2">Booking Not Found</h3>
                    <p class="text-gray-600 mb-4">This booking doesn't exist or you don't have access to it.</p>
                    <a href="{{ route('booking.index') }}" 
                       class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition">
                        Back to Bookings
                    </a>
                </div>
            </div>
        @endif
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

</body>
</html>