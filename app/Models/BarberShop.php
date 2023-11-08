<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarberShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'phone_number', 'operating_hours', 'description', 'toko',
    ];

    public function capsters()
    {
        return $this->hasMany(Capster::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
