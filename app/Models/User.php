<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['name', 'email', 'password', 'phone_number', 'role'];

    protected $hidden = ['password', 'remember_token'];

    public function barbershop()
    {
        return $this->hasOne(Barbershop::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'user_reservation', 'user_id', 'reservation_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
