<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Bookings - Healing Tour & Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
    .ticket-card {
      display: flex;
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .ticket-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    }
    .ticket-left {
      flex: 2;
      position: relative;
    }
    .ticket-left img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .ticket-info {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
      padding: 20px;
      color: white;
    }
    .ticket-info h2 {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 4px;
    }
    .ticket-info p {
      font-size: 14px;
      opacity: 0.9;
    }
    .ticket-logo {
      margin-top: 8px;
      font-size: 11px;
      opacity: 0.8;
    }
    .ticket-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      border-left: 2px dashed #e5e7eb;
      background: #fafafa;
    }
    .ticket-right::before,
    .ticket-right::after {
      content: "";
      position: absolute;
      left: -12px;
      width: 24px;
      height: 24px;
      background: #f3f4f6;
      border-radius: 50%;
      border: 2px solid #e5e7eb;
    }
    .ticket-right::before { top: -12px; }
    .ticket-right::after { bottom: -12px; }
    .show-btn {
      background: #ff914d;
      color: white;
      padding: 10px 24px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      border: none;
      transition: all 0.3s;
      text-decoration: none;
      display: inline-block;
    }
    .show-btn:hover {
      background: #ff7a1a;
      transform: scale(1.05);
    }
    .status-badge {
      position: absolute;
      top: 12px;
      right: 12px;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      z-index: 10;
    }
    .status-pending { background: #fbbf24; color: #78350f; }
    .status-paid { background: #34d399; color: #064e3b; }
  </style>
</head>
<body class="bg-gray-50 pt-20">

  @include('partials.navbar')

  <main class="max-w-4xl mx-auto mt-12 px-6 pb-12">
    
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-900 mb-2">My Bookings</h1>
      <p class="text-gray-600">All your booking history and active tickets</p>
    </div>

    @if($groupedBookings->isEmpty())
      <!-- Empty State -->
      <div class="text-center py-16 bg-white rounded-2xl shadow-sm">
        <i class="far fa-calendar-times text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Bookings Yet</h3>
        <p class="text-gray-500 mb-6">You haven't made any bookings yet. Start exploring!</p>
        <a href="{{ route('destinations.index') }}" 
           class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-medium transition">
          <i class="fas fa-compass mr-2"></i>
          Explore Destinations
        </a>
      </div>
    @else
      <!-- Bookings Container -->
      <div class="space-y-6">
        @foreach($groupedBookings as $bookingCode => $groupedBooking)
          @php
            $firstBooking = $groupedBooking->first();
            $totalDestinations = $groupedBooking->count();
            
            // Status styling
            $statusClass = $firstBooking->payment_status === 'paid' ? 'status-paid' : 'status-pending';
            $statusText = $firstBooking->payment_status === 'paid' ? 'Paid' : 'Pending';
          @endphp
          
          <div class="ticket-card">
            <div class="ticket-left">
              <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
              <img src="{{ asset('storage/' . $firstBooking->destination->image) }}" 
                   alt="{{ $firstBooking->destination->name }}">
              <div class="ticket-info">
                <h2>{{ $firstBooking->destination->name }}</h2>
                @if($totalDestinations > 1)
                  <p class="text-xs mb-1">+{{ $totalDestinations - 1 }} more destination{{ $totalDestinations > 2 ? 's' : '' }}</p>
                @endif
                <p>
                  <i class="far fa-calendar-alt mr-2"></i>
                  {{ \Carbon\Carbon::parse($firstBooking->travel_date)->format('d F Y') }}
                </p>
                <div class="ticket-logo">
                  <i class="fas fa-plane mr-1"></i>Healing Tour and Travel • {{ $bookingCode }}
                </div>
              </div>
            </div>
            <div class="ticket-right">
              <a href="{{ route('booking.show', $bookingCode) }}" class="show-btn">
                <i class="fas fa-ticket-alt mr-2"></i>Show Details
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </main>

  @include('partials.footer')
</body>
</html>