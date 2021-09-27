<?php

namespace App\Models;

use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'idtransaksi',
        'namaortu',
        'idpolis',
        'tanggal',
        'premi',
        'keterangan',
    ];
    protected $dates = [
        'tanggal',
        'created_at'
    ];
    public $timestamps = false;

    public function angsuran()
    {
        return $this->belongsTo(Fulnadi::class, 'idtransaksi');
    }
}
