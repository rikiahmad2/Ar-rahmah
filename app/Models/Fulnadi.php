<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fulnadi extends Model
{
    use HasFactory;

    protected $table = 'angsuran';
    protected $fillable = [
        'idpolis',
        'namaortu',
        'paketkontribusi',
        'sisa_angsuran',
        'bagihasil',
        'masaperjanjian',
        'carabayar',
        'mta',
        'jmlhtabarru',
    ];
    protected $dates = [
        'created_at'
    ];

    public function anggota()
    {
        return $this->belongsTo(Peserta::class, 'id_anggota');
    }
}
