<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'reservation_datetime', 'additional_notes', 'user_id', 'barber_shop_id', 'service_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barberShop()
    {
        return $this->belongsTo(BarberShop::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
