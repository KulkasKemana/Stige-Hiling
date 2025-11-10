@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Revenue -->
    <div class="stat-card bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm font-medium mb-1">Total Revenue</p>
                <p class="text-3xl font-bold">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
            </div>
            <div class="bg-white/20 p-4 rounded-full">
                <i class="fas fa-dollar-sign text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Bookings -->
    <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium mb-1">Total Bookings</p>
                <p class="text-3xl font-bold">{{ $stats['total_bookings'] }}</p>
            </div>
            <div class="bg-white/20 p-4 rounded-full">
                <i class="fas fa-ticket-alt text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Users -->
    <div class="stat-card bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium mb-1">Total Users</p>
                <p class="text-3xl font-bold">{{ $stats['total_users'] }}</p>
            </div>
            <div class="bg-white/20 p-4 rounded-full">
                <i class="fas fa-users text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Destinations -->
    <div class="stat-card bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium mb-1">Destinations</p>
                <p class="text-3xl font-bold">{{ $stats['total_destinations'] }}</p>
            </div>
            <div class="bg-white/20 p-4 rounded-full">
                <i class="fas fa-map-marked-alt text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Bookings -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <h3 class="text-lg font-bold text-gray-800">Recent Bookings</h3>
        <a href="{{ route('admin.bookings.index') }}" class="text-orange-500 hover:text-orange-600 text-sm font-medium">
            View All <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking Code</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recent_bookings as $booking)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm font-medium text-gray-900">{{ $booking->booking_code }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm text-gray-700">{{ $booking->user->name }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-700">{{ $booking->destination->name }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm font-semibold text-gray-900">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($booking->payment_status === 'paid')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i> Paid
                            </span>
                        @elseif($booking->payment_status === 'pending')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i> Pending
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-1"></i> Cancelled
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-2"></i>
                        <p class="text-gray-500">No bookings yet</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection