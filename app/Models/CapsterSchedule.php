<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapsterSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['work_day', 'work_time_start', 'work_time_end', 'capster_id'];

    public function capster()
    {
        return $this->belongsTo(Capster::class);
    }
}