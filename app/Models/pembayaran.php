<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'idBooking',
        'metodePembayaran'
    ];
    public function booking()
    {
        return $this->belongsTo(booking::class, 'idBooking');
    }
    //
}
