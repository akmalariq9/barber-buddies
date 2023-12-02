<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        // Ensure the reservation belongs to the authenticated user
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('reviews.create', ['reservation' => $reservation]);
    }

    public function store(Request $request, $reservationId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'comment' => 'required|string',
        ]);

        $reservation = Reservation::findOrFail($reservationId);

        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if ($reservation->status !== 'Confirmed') {
            abort(403, 'Unable to review. Reservation is not completed.');
        }

        // Create a new review
        $review = new Review([
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'review_date' => now(),
            'user_id' => Auth::id(),
            'barber_shop_id' => $reservation->barber_shop_id,
            'reservation_id' => $reservation->id,
        ]);

        $review->save();
        return redirect()->route('reservasi.showforuser', ['user'=> Auth::user()->id])->with('status', 'Review added.');
    }
}
