<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'duration', 'barber_shop_id'];

    public function barberShop()
    {
        return $this->belongsTo(BarberShop::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
