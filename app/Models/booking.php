<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUser',
        'idPenerbangan',
        'jumlah',
        'totalHarga',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
    public function penerbangan()
    {
        return $this->belongsTo(penerbangan::class, 'idPenerbangan');
    }
    public function tiket()
    {
        return $this->hasMany(tiket::class, 'id_booking');
    }
    public function pembayaran()
    {
        return $this->hasOne(pembayaran::class);
    }
}
