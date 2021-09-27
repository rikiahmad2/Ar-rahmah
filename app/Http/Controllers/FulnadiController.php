<?php

namespace App\Http\Controllers;

use App\Models\Fulnadi;
use App\Models\Peserta;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class FulnadiController extends Controller
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

        $setor = Fulnadi::where(function ($query) use ($q) {
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
        $anggota = Peserta::orderBy('namaanak')->get();

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
        $anggota = Peserta::findOrFail($request->idpolis);

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

        $angsuran = Fulnadi::create($req);



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
        $setor = Fulnadi::findOrFail($id);
        $anggota = Peserta::findOrFail($setor->idpolis);
        $transaksi = Transaksi::where('idtransaksi', '=', $id)->get();

        return view('setor.show', compact('setor', 'transaksi', 'anggota'));
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
        $anggota = Peserta::findOrFail($request->id_anggota);

        $req = $request->except('_token', '_method');
        $req['namaanak'] = $anggota->namaanak;
        $req['namaortu'] = $anggota->namaortu;
        $req['paket_takaful'] = $anggota->paket_takaful;
        $req['masa_perjanjian'] = $anggota->masa_perjanjian;
        $req['cara_bayar'] = $anggota->cara_bayar;
        $req['total_bayarTahun'] = $anggota->total_bayarTahun;

        $angsuran = Fulnadi::findOrFail($id);
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
        Fulnadi::findOrFail($id)->delete();

        return redirect()->route('setor.index')->with('success', 'Data berhasil dihapus');
    }

    public function pdfprint($id)
    {

        //Data
        $setor = Fulnadi::findOrFail($id);
        $anggota = Peserta::findOrFail($setor->idpolis);

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(70, 15, "Data Premi ".$setor->namaortu);
        $fpdf->SetFont('Arial', 'B', 8);

        $fpdf->setX(30);
        $fpdf->Cell(10, 25, '1' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 25, 'ID', 1, 0, 'C');
        $fpdf->Cell(60, 25, $setor->id, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '2' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Nama Anak', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $anggota->namaanak, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '3' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Nama Orang Tua', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $setor->namaortu, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '4' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Paket Kontribusi', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, 'Rp.'.number_format($setor->paketkontribusi), 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '5' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Bagi Hasil', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, 'Rp.'.number_format($setor->bagihasil), 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '6' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Sisa Angsuran', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, 'Rp.'.number_format($setor->sisa_angsuran), 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '7' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Masa perjanjian', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $setor->masaperjanjian, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '8' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Tanggal buat', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $setor->created_at, 1, 1, 'C');
        


        $fpdf->SetTitle('Premi');
        $this->fpdf->Output();
        exit;
    }
}
