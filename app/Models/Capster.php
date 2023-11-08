<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capster extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone_number', 'description', 'barber_shop_id'];

    public function barberShop()
    {
        return $this->belongsTo(BarberShop::class);
    }

    public function schedules()
    {
        return $this->hasMany(CapsterSchedule::class);
    }
}