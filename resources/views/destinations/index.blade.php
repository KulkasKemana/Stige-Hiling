@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-4">My Bookings</h2>

    @forelse($bookings as $booking)
        <div class="border-b py-4">
            <h3 class="font-semibold">{{ $booking->destination->name }}</h3>
            <p>Tanggal: {{ $booking->booking_date }}</p>
            <p>Jumlah: {{ $booking->quantity }}</p>
            <p>Total: Rp {{ number_format($booking->price_snapshot * $booking->quantity, 0, ',', '.') }}</p>
        </div>
    @empty
        <p>Belum ada booking</p>
    @endforelse
</div>
@endsection
