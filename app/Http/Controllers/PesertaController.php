<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class PesertaController extends Controller
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

        $anggota = Peserta::where(function($query) use($q) {
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

        Peserta::create($request->except('_token'));

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
        $anggota = Peserta::findOrFail($id);
        
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
        $anggota = Peserta::findOrFail($id);
        
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

        $anggota = Peserta::findOrFail($id);

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
        Peserta::findOrFail($id)->delete();

        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus');
    }

    public function pdfprint($id)
    {
        $anggota = Peserta::findOrFail($id);

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(90, 15, "Data Anggota");
        $fpdf->SetFont('Arial', 'B', 8);

        $fpdf->setX(30);
        $fpdf->Cell(10, 25, '1' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 25, 'Id Anggota', 1, 0, 'C');
        $fpdf->Cell(60, 25, $anggota->id, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '2' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Jenis Produk', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->jenisproduk, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '3' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Nama Orang Tua', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->namaortu, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '4' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Pekerjaan Ortu', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->pekerjaan, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '5' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Nama Anak', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->namaanak, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '6' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Usia Anak', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->usiaanak, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '7' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Jenis Kelamin Anak', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->jkanak, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '8' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Alamat', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->alamat, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '9' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'No Handphone', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->no_telp, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '10' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Tanggal buat', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->created_at, 1, 1, 'C');
        


        $fpdf->SetTitle('Anggota');
        $this->fpdf->Output();
        exit;
    }
}
