@extends('template.app')

@section('title', '| Transaksi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></div>
                <div class="breadcrumb-item">Detail Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Data</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>ID Polis</strong>
                                    <span>{{ $transaksi->idpolis }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Nama Pemegang</strong>
                                    <span>{{ $transaksi->namaortu }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Jumlah Setoran</strong>
                                    <span>{{ 'Rp '.number_format($transaksi->premi) }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Keterangan</strong>
                                    <span>{{ $transaksi->keterangan ? $transaksi->keterangan : '-' }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Tanggal</strong>
                                    <span>{{ $transaksi->tanggal->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            <a href="{{ route('transaksi.destroy', ['id' => $transaksi->id]) }}" class="btn btn-sm btn-danger" type="submit">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
