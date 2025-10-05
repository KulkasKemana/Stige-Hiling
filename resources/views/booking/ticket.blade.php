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
            padding-bottom: 0;
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
        }
        .ticket-container {
            max-width: 400px;
            margin: 0 auto 40px;
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
    </style>
</head>
<body class="pt-24">

    @include('partials.navbar')

    <div class="header">
        <a href="{{ route('booking.index') }}" class="back-arrow">←</a>
        <span>Ticket Details</span>
    </div>

    @foreach($bookings as $booking)
    <div class="ticket-container">
        <div class="ticket-header">
            <div class="logo-section">
                <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" class="w-10 h-10 object-contain" width="40" height="40" alt="Logo" />
                <div>
                    <div style="font-size: 12px; color: #666;">Healing</div>
                    <div style="font-size: 12px; color: #666;">Tour And Travel</div>
                </div>
            </div>
            
            <div class="destination">{{ $booking->destination->name }}</div>
            
            <div class="ticket-info">
                <div class="info-item">
                    <div class="info-label">Order ID</div>
                    <div class="info-value">
                        <span class="order-id">{{ $bookingInfo->booking_code }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Entry Date</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($booking->travel_date)->format('d M Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Visitor</div>
                    <div class="info-value">{{ $booking->name }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Ticket</div>
                    <div class="info-value">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-ticket-alt text-gray-600"></i>
                            <span>{{ $booking->quantity }}x</span>
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
    @endforeach

    @include('partials.footer')
</body>
</html>