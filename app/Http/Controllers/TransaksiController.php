<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;

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
        $transaksiM = Transaksi::findOrFail($id);
        $transaksiM->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil Dihapus');
    }

    public function pdfprint($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(90, 15, "Data Transaksi");
        $fpdf->SetFont('Arial', 'B', 8);

        $fpdf->setX(30);
        $fpdf->Cell(10, 25, '1' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 25, 'IdPolis', 1, 0, 'C');
        $fpdf->Cell(60, 25, $transaksi->idpolis, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '2' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Nama Pemegang', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $transaksi->namaortu, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '3' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Jumlah Setoran', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $transaksi->premi, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '4' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Keterangan', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $transaksi->keterangan, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '5' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Tanggal', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $transaksi->created_at, 1, 1, 'C');

        $fpdf->SetTitle('Transaksi');
        $this->fpdf->Output();
        exit;
    }
}
