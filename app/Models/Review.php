<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'comment', 'review_date', 'user_id', 'barber_shop_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barberShop()
    {
        return $this->belongsTo(BarberShop::class);
    }
}
