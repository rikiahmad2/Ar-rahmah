<?php

namespace App\Models;

use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $fillable = [
        'namaortu',
        'tglortu',
        'usiaortu',
        'jkortu',
        'namaanak',
        'tglanak',
        'usiaanak',
        'jkanak',
        'perokok',
        'alamat',
        'pekerjaan',
        'no_telp',
        'email',
        'standart',
        'kontribusi',
        'carabayar',
        'tahapan',
        'nama_agen',
        'no_agen'
    ];
    protected $dates = [
        'tglortu',
        'tglanak',
        'created_at'
    ];

    public function setor()
    {
        return $this->hasMany(Fulnadi::class, 'id_anggota');
    }
}
