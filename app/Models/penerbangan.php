<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaMaskapai',
        'asal',
        'tujuan',
        'tanggalBerangkat',
        'waktuBerangkat',
        'harga',
        'kapasitas',
    ];

    public function tiket()
    {
        return $this->hasMany(tiket::class);
    }
    public function tiketTersedia()
    {

        return $this->hasMany(tiket::class, 'idPenerbangan')->where('status', 'tersedia');
    }
    public function booking()
    {
        return $this->hasMany(booking::class);
    }
}
