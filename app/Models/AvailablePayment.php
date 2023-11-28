<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailablePayment extends Model
{
    protected $table = 'available_payment';
    use HasFactory;
    protected $fillable = ['payment_method', 'account_number', 'barber_shop_id'];
    
    public function barberShop()
    {
        return $this->belongsTo(BarberShop::class);
    }
}
