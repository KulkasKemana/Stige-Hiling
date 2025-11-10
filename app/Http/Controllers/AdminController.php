<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_bookings' => Booking::count(),
            'total_destinations' => Destination::count(),
            'total_revenue' => Booking::where('payment_status', 'paid')->sum('total_price'),
        ];

        $recent_bookings = Booking::with(['user', 'destination'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_bookings'));
    }

    // ==================== DESTINATIONS MANAGEMENT ====================
    
    public function destinations()
    {
        $destinations = Destination::latest()->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    public function createDestination()
    {
        return view('admin.destinations.create');
    }

    public function storeDestination(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('destinations', 'public');
            $validated['image'] = $path;
        }

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function editDestination($id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.destinations.edit', compact('destination'));
    }

    public function updateDestination(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($destination->image && \Storage::disk('public')->exists($destination->image)) {
                \Storage::disk('public')->delete($destination->image);
            }
            $path = $request->file('image')->store('destinations', 'public');
            $validated['image'] = $path;
        }

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil diperbarui');
    }

    public function deleteDestination($id)
    {
        $destination = Destination::findOrFail($id);
        
        // Delete image if exists
        if ($destination->image && \Storage::disk('public')->exists($destination->image)) {
            \Storage::disk('public')->delete($destination->image);
        }
        
        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil dihapus');
    }

    // ==================== USERS MANAGEMENT ====================
    
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'is_admin' => 'required|boolean',
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Remove password from validated if not provided
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri');
        }
        
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus');
    }

    // ==================== BOOKINGS MANAGEMENT ====================
    
    public function bookings()
    {
        $bookings = Booking::with(['user', 'destination'])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,paid,cancelled'
        ]);

        $booking->update(['payment_status' => $validated['status']]);

        return back()->with('success', 'Status pemesanan berhasil diperbarui');
    }

    // ==================== REPORTS ====================
    
    public function reports()
    {
        $stats = [
            'total_users' => User::count(),
            'total_bookings' => Booking::count(),
            'total_destinations' => Destination::count(),
            'total_revenue' => Booking::where('payment_status', 'paid')->sum('total_price'),
            'pending_bookings' => Booking::where('payment_status', 'pending')->count(),
            'paid_bookings' => Booking::where('payment_status', 'paid')->count(),
            'cancelled_bookings' => Booking::where('payment_status', 'cancelled')->count(),
        ];

        // Monthly revenue (last 6 months)
        $monthly_revenue = Booking::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(total_price) as revenue')
            ->where('payment_status', 'paid')
            ->whereYear('created_at', date('Y'))
            ->groupBy('year', 'month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        // Top destinations
        $top_destinations = Booking::selectRaw('destination_id, COUNT(*) as booking_count')
            ->with('destination')
            ->groupBy('destination_id')
            ->orderBy('booking_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.reports', compact('stats', 'monthly_revenue', 'top_destinations'));
    }
}