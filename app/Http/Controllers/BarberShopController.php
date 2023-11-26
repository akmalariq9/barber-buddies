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
}
