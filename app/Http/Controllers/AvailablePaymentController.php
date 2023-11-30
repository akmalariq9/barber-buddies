<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AvailablePaymentController extends Controller
{
    //Show Service Form
    public function showPaymentForm()
    {
        return view('barbershop.availablepayment');
    }

    //Add Service
    public function addpayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|max:255',
            'account_number' => 'required|string',
        ]);

        $barbershop = DB::table('barber_shops')->where('user_id', Auth::user()->id)->first();

        DB::table('available_payment')->insert([
            'payment_method' => $request->payment_method,
            'account_number' => $request->account_number,
            'barber_shop_id' => $barbershop->id,
        ]);
        return redirect()->route('dashboardz');
    }
}
