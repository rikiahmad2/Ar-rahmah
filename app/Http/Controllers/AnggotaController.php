<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = '';

        if($request->q) {
            $q = $request->q;
        }

        $anggota = Anggota::where(function($query) use($q) {
            if($q) {
                $query->where('nik', 'like', '%'.$q.'%')
                        ->orWhere('nama', 'like', '%'.$q.'%')
                        ->orWhere('no_hp', 'like', '%'.$q.'%')
                        ->orWhere('pekerjaan', 'like', '%'.$q.'%');
            }
        })->latest()->paginate(10);

        return view('anggota.index', compact('anggota', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'unique:anggota,nik'
        ], [
            'nik.unique' => 'NIK sudah ada'
        ]);

        Anggota::create($request->except('_token'));

        return redirect()->route('anggota.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        
        return view('anggota.edit', compact('anggota'));
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
        $this->validate($request, [
            'nik' => 'unique:anggota,nik,'.$id
        ], [
            'nik.unique' => 'NIK sudah ada'
        ]);

        $anggota = Anggota::findOrFail($id);

        $anggota->update($request->except('_token', '_method'));

        return redirect()->route('anggota.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::findOrFail($id)->delete();

        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus');
    }
}
