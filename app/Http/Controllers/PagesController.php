<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function getIndex()
    {
        $anggota = DB::table('anggota')->count();
        $angsuran = DB::table('angsuran')->count();
        $transaksi = DB::table('transaksi')->count();

        return view('pages.index', compact('anggota', 'angsuran', 'transaksi'));
    }

    public function getIndexUser()
    {
        $anggota = DB::table('anggota')->count();
        $angsuran = DB::table('angsuran')->count();
        $transaksi = DB::table('transaksi')->count();

        return view('pages.index', compact('anggota', 'angsuran', 'transaksi'));
    }
}
