<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function showServiceForm()
    {
        return view('barbershop.service');
    }

    public function addservice(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required',
            'duration' => 'required|integer',
        ]);
        
        $barbershop = DB::table('barber_shops')->where('user_id', Auth::user()->id)->first();

        DB::table('services')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'barber_shop_id' => $barbershop->id,
        ]);
        return redirect()->route('dashboardz');
    }
}
