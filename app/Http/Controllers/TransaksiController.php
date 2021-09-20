<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = '';

        if ($request->q) {
            $q = $request->q;
        }

        $transaksi = Transaksi::where(function ($query) use ($q) {
            if ($q) {
                $query->where('idtransaksi', '=', $q)
                    ->orWhere('namaortu', 'like', '%' . $q . '%')
                    ->orWhere('idpolis', 'like', '%' . $q . '%')
                    ->orWhere('tanggal', 'like', '%' . $q . '%')
                    ->orWhere('premi', 'like', '%' . $q . '%')
                    ->orWhere('mta', 'like', '%' . $q . '%');
            }
        })->orderBy('tanggal', 'desc')->paginate(10);

        return view('transaksi.index', compact('transaksi', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_angsuran)
    {
        $angsuran = Setor::findOrFail($id_angsuran);

        return view('transaksi.create', compact('angsuran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $angsuran = Setor::findOrFail($request->id_angsuran);
        $angsuran->sisa_angsuran = $angsuran->sisa_angsuran - $request->premi;

        $setor_check = Setor::find($request->idtransaksi);
        if($setor_check == null)
        {
            return redirect()->route('transaksi.index')->with('failed', 'Gagal, Id Transaksi tidak ditemukan');
        }

        Transaksi::create([
            'idtransaksi' => $request->idtransaksi,
            'namaortu' => $angsuran->namaortu,
            'idpolis' => $request->idpolis,
            'tanggal' => $request->tanggal,
            'premi' => $request->premi,
            'keterangan' => $request->keterangan,
        ]);
        $angsuran->save();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
