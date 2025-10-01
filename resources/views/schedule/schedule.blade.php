<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schedule - Healing Tour & Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
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

    /* Ticket Card Styles */
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

    .ticket-right::before {
      top: -12px;
    }

    .ticket-right::after {
      bottom: -12px;
    }

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
    }

    .show-btn:hover {
      background: #ff7a1a;
      transform: scale(1.05);
    }
  </style>
</head>
<body class="bg-gray-50 pt-20">

  {{-- Include Navbar --}}
  @include('partials.navbar')

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto mt-12 px-6 pb-12">
    
    <!-- Header Section -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Your Schedule</h1>
      <p class="text-gray-600">All your active booking tickets</p>
    </div>

    <!-- Tickets Container -->
    <div class="space-y-6">
      
      <!-- Ticket 1: Kyoto -->
      <div class="ticket-card">
        <div class="ticket-left">
          <img src="{{ asset('assets/shrine.png') }}" alt="Kyoto Japan">
          <div class="ticket-info">
            <h2>Kyoto - Japan</h2>
            <p><i class="far fa-calendar-alt mr-2"></i>25 July 2024</p>
            <div class="ticket-logo">
              <i class="fas fa-plane mr-1"></i>Healing Tour and Travel
            </div>
          </div>
        </div>
        <div class="ticket-right">
          <button class="show-btn">
            <i class="fas fa-ticket-alt mr-2"></i>Show Details
          </button>
        </div>
      </div>

      <!-- Ticket 2: Makkah -->
      <div class="ticket-card">
        <div class="ticket-left">
          <img src="{{ asset('assets/masjid.png') }}" alt="Makkah Saudi Arabia">
          <div class="ticket-info">
            <h2>Makkah - Saudi Arabia</h2>
            <p><i class="far fa-calendar-alt mr-2"></i>15 October 2024</p>
            <div class="ticket-logo">
              <i class="fas fa-plane mr-1"></i>Healing Tour and Travel
            </div>
          </div>
        </div>
        <div class="ticket-right">
          <button class="show-btn">
            <i class="fas fa-ticket-alt mr-2"></i>Show Details
          </button>
        </div>
      </div>

      <!-- Empty State (jika tidak ada booking) -->
      {{-- Uncomment ini kalau mau tampilkan saat tidak ada schedule
      <div class="text-center py-16">
        <i class="far fa-calendar-times text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Schedule Yet</h3>
        <p class="text-gray-500 mb-6">You haven't booked any trips yet</p>
        <a href="{{ route('destinations.index') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-medium transition">
          Explore Destinations
        </a>
      </div>
      --}}

    </div>
  </main>

  {{-- Include Footer --}}
  @include('partials.footer')
</body>
</html>