<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;
    protected $fillable = [
        'no',
        'idPenerbangan',
        'idUser',
        'status',
        'id_booking'
    ];
    public function penerbangan()
    {
        return $this->belongsTo(penerbangan::class, 'idPenerbangan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
    public function booking()
    {
        return $this->belongsTo(booking::class, 'id_booking');
    }
}
