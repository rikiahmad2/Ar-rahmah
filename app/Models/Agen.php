<?php

namespace App\Models;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;

    protected $table = 'agen';
    protected $fillable = [
        'nama_agen',
        'no_agen'
    ];

    protected $dates = [
        'created_at'
    ];

    public function Anggota()
    {
        return $this->hasMany(Anggota::class, 'id_agen');
    }
}
