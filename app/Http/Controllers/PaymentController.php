<?php

namespace App\Http\Controllers;

// app/Http/Controllers/PaymentController.php

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Reservation;

class PaymentController extends Controller
{
    public function create($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        return view('payments.create', compact('reservation'));
    }

    public function store(Request $request)
    {
        Payment::create([
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'reservation_id' => $request->reservation_id,
        ]);
        return redirect()->route('landing');
    }
}
