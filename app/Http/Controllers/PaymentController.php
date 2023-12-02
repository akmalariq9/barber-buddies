<?php

namespace App\Http\Controllers;

// app/Http/Controllers/PaymentController.php

use App\Models\AvailablePayment;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

// use App\Models\AvailablePayment; // Tambahkan ini

class PaymentController extends Controller
{
    public function create($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $availablePayments = AvailablePayment::where('barber_shop_id', $reservation->barber_shop_id)->get();

        return view('payments.create', compact('reservation', 'availablePayments'));
    }

    public function store(Request $request)
    {
        $total_amount = DB::table('payments')->join('reservations', 'payments.reservation_id', '=', 'reservations.id')->select('payments.*', 'reservations.total_amount')->where('reservation_id', $request->reservation_id)->first();
        
        Payment::create([
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'account_number' => $request->account_number,
            'reservation_id' => $request->reservation_id,
        ]);
        return redirect()->route('landing');
    }
}