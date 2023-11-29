<?php

namespace App\Http\Controllers;

use App\Models\BarberShop;
use App\Models\Capster;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ReservasiController extends Controller
{
    public function index()
    {
        $barberShops = BarberShop::all();
        $services = Service::all();
        $statuses = ['Pending', 'Confirmed', 'Canceled', 'Completed'];

        return view('reserve', compact('barberShops', 'statuses', 'services', ));
    }

    public function store(Request $request)
    {
        $total_amount = Service::where('id', $request->service_id)->first()->price;
        $reservation = Reservation::create([
            'name' => auth()->user()->name,
            'barber_shop_id' => $request->barber_shop_id,
            'status' => 'Pending',
            'reservation_datetime' => $request->reservation_datetime,
            'service_id' => $request->service_id,
            'additional_notes' => $request->additional_notes,
            'user_id' => auth()->user()->id,
            'total_amount' => $total_amount,
        ]);
        return redirect()->route('payment.form', ['reservation' => $reservation->id]);
    }

    public function show(Reservation $reservation)
    {
        $barbershopId = auth()->user()->barbershop->id;
        //make $reservations get from barbershop_id to name
        // $reservations = Reservation::where('barber_shop_id', $barbershopId)->get();
        
        $reservations = DB::table('reservations')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.*', 'users.name')->where('barber_shop_id', $barbershopId)->get();

        // dd($reservations);
        return view('reservation.show', ['reservations' => $reservations]);
    }

    public function edit(BarberShop $barbershop, Reservation $reservasi)
    {
        return view('reservation.edit', compact('barbershop', 'reservasi'));
    }

    public function update(Request $request, BarberShop $barbershop, Reservation $reservasi)
    {
        // dd($request->all());
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Canceled,Completed',
        ]);

        $reservasi->update([
            'status' => $request->status,
        ]);

        return redirect()->route('reservasi.show', ['barbershop' => $barbershop, 'reservasi' => $reservasi])
            ->with('success', 'Status reservasi berhasil diubah.');
    }
}