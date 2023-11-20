<?php

namespace App\Http\Controllers;

use App\Models\BarberShop;
use App\Models\Capster;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $barberShops = BarberShop::all();
        $capsters = Capster::all();

        return view('reserve', compact('barberShops', 'capsters'));
    }
    public function getCapster($capster){
        $capsters = Capster::where('barber_shop_id', $capster)->get();

        return response()->json(['capsters' => $capsters]);
    }
    public function store(Request $request){
        Reservation::create([
            'name' => $request->name,
            'barber_shop_id' => $request->barber_shop_id,
        ]);
    }
}
