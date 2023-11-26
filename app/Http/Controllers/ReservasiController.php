<?php

namespace App\Http\Controllers;

use App\Models\BarberShop;
use App\Models\Capster;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;
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
        // dd($request->all());
        Reservation::create([
            'name' => $request->name,
            'barber_shop_id' => $request->barber_shop_id,
            'status' => $request->status,
            'reservation_datetime' => $request->reservation_datetime,
            'service_id' => $request->service_id,
            'additional_notes' => $request->additional_notes,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Reservasi berhasil disimpan.');
    }
}