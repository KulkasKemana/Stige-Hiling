<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Display a listing of bookmarks
     */
    public function index()
    {
        $bookmarks = Auth::user()->bookmarks()
                        ->with('destination')
                        ->latest()
                        ->get();
        
        return view('bookmark', compact('bookmarks'));
    }

    /**
     * Toggle bookmark (add or remove)
     */
    public function toggle($destinationId)
    {
        $isBookmarked = Auth::user()->toggleBookmark($destinationId);
        
        return response()->json([
            'success' => true,
            'bookmarked' => $isBookmarked,
            'message' => $isBookmarked ? 'Added to bookmarks' : 'Removed from bookmarks'
        ]);
    }

    /**
     * Check if destination is bookmarked
     */
    public function check($destinationId)
    {
        $bookmarked = Auth::user()->hasBookmarked($destinationId);
        
        return response()->json([
            'bookmarked' => $bookmarked
        ]);
    }

    /**
     * Remove bookmark
     */
    public function destroy($destinationId)
    {
        $bookmark = Bookmark::where('user_id', Auth::id())
                           ->where('destination_id', $destinationId)
                           ->first();
        
        if ($bookmark) {
            $bookmark->delete();
            return response()->json([
                'success' => true,
                'message' => 'Bookmark removed successfully'
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Bookmark not found'
        ], 404);
    }
}