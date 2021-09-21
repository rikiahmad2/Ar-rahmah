<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Anggota;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SetorController extends Controller
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

        $setor = Setor::where(function ($query) use ($q) {
            if ($q) {
                $query->where('id', '=', $q)
                    ->orWhere('namaanak', 'like', '%' . $q . '%')
                    ->orWhere('namaortu', 'like', '%' . $q . '%')
                    ->orWhere('paketkontribusi', 'like', '%' . $q . '%')
                    ->orWhere('masaperjanjian', 'like', '%' . $q . '%')
                    ->orWhere('carabayar', 'like', '%' . $q . '%')
                    ->orWhere('mta', 'like', '%' . $q . '%')
                    ->orWhere('persentabarru', 'like', '%' . $q . '%')
                    ->orWhere('jmlhtabarru', 'like', '%' . $q . '%');
            }
        })->latest()->paginate(10);

        return view('setor.index', compact('setor', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = Anggota::orderBy('namaanak')->get();

        return view('setor.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $anggota = Anggota::findOrFail($request->idpolis);

        $req = $request->except('_token');
        $req['namaortu'] = $anggota->namaortu;
        $req['paketkontribusi'] = $request->paketkontribusi;
        $req['sisa_angsuran'] = $request->paketkontribusi;
        $req['masaperjanjian'] = $request->masaperjanjian;
        $req['carabayar'] = $request->carabayar;
        $req['mta'] = $request->mta;
        $req['persentabarru'] = $anggota->persentabarru;
        $req['jmlhtabarru'] = $request->jmlhtabarru;
        $req['bagihasil'] = $request->bagihasil;

        $angsuran = Setor::create($req);



        return redirect()->route('setor.index', $angsuran->id)->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setor = Setor::findOrFail($id);
        $transaksi = Transaksi::where('idtransaksi', '=', $id)->get();

        return view('setor.show', compact('setor', 'transaksi'));
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
        $anggota = Anggota::findOrFail($request->id_anggota);

        $req = $request->except('_token', '_method');
        $req['namaanak'] = $anggota->namaanak;
        $req['namaortu'] = $anggota->namaortu;
        $req['paket_takaful'] = $anggota->paket_takaful;
        $req['masa_perjanjian'] = $anggota->masa_perjanjian;
        $req['cara_bayar'] = $anggota->cara_bayar;
        $req['total_bayarTahun'] = $anggota->total_bayarTahun;

        $angsuran = Setor::findOrFail($id);
        $angsuran->update($req);

        return redirect()->route('setor.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setor::findOrFail($id)->delete();

        return redirect()->route('setor.index')->with('success', 'Data berhasil dihapus');
    }
}
