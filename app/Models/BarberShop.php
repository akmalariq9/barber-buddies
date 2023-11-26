<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class BarberShop extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;
    
    protected $fillable = [
        'name', 'email', 'password', 'address', 'description', 'worker', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barberShopSchedules()
    {
        return $this->hasMany(BarberShopSchedule::class);
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