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

    //Function to destroy or delete
    public function destroy(BarberShop $barbershop, Reservation $reservasi)
    {
        // dd($reservasi);
        $reservasi->delete();
        $barbershopId = auth()->user()->barbershop->id;

        return redirect()->route('reservasi.show', ['reservasi' => $reservasi, 'barbershop' => $barbershopId])->with('success', 'Reservasi berhasil dihapus.');
    }

    public function show(Reservation $reservation)
    {
        $barbershopId = auth()->user()->barbershop->id;
        $reservations = Reservation::with(['user', 'review'])->where('barber_shop_id', $barbershopId)->get();
        
        return view('reservation.show', ['reservations' => $reservations]);
    }

    public function showforuser(Reservation $reservation)
    {
        $userID = auth()->user()->id;
        $reservations = DB::table('reservations')->join('barber_shops', 'reservations.barber_shop_id', '=', 'barber_shops.id')->select('reservations.*', 'barber_shops.name')->where('reservations.user_id', $userID)->get();

        return view('user.history', ['reservations' => $reservations,]);
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