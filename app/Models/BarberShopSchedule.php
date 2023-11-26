<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarberShopSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['barber_shop_id', 'day', 'opening_hours', 'closing_hours'];

    public function barberShop()
    {
        return $this->belongsTo(BarberShop::class);
    }
}
