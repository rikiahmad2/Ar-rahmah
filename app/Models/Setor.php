<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'angsuran';
    protected $fillable = [
        'idpolis',
        'namaortu',
        'paketkontribusi',
        'sisa_angsuran',
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
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
