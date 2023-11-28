<?php
// app/Http/Controllers/BarbershopController.php

// app/Http/Controllers/BarbershopController.php

namespace App\Http\Controllers;

use App\Models\Barbershop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarbershopController extends Controller
{
    public function create()
    {
        return view('barbershop.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'required|string',
            'worker' => 'required|integer',
        ]);

        $barbershop = Barbershop::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'worker' => $request->input('worker'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('dashboardz')->with('success', 'Barbershop created successfully!');
    }

    public function show(BarberShop $barberShop)
    {
        return view('barbershop.show', compact('barberShop'));
    }

    public function edit(BarberShop $barberShop)
    {
        return view('barbershop.edit', compact('barberShop'));
    }

    public function update(Request $request, BarberShop $barberShop)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $barberShop->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'worker' => $request->input('worker'),
        ]);

        return redirect()->route('barbershop.show', $barberShop)->with('success', 'Profile updated successfully');
    }
}
