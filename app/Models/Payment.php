<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['payment_method', 'total_amount', 'payment_date', 'reservation_id'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
