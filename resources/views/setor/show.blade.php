@extends('template.app')

@section('title', '| Premi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setoran Premi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('setor.index') }}">Premi</a></div>
                <div class="breadcrumb-item">Detail Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Data</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>ID</strong>
                                    <span>{{ $setor->id }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Nama Aanak</strong>
                                    <span>{{ $setor->namaanak }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Nama Orang Tua</strong>
                                    <span>{{ $setor->namaortu }}</span>
                                </ul>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Paket Kontribusi</strong>
                                    <span>{{ 'Rp '.number_format($setor->paketkontribusi) }}</span>
                                </ul>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Bagi Hasil</strong>
                                    <span>{{ 'Rp '.number_format($setor->bagihasil) }}</span>
                                </ul>
                            </li>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('setor.destroy', $setor->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">

                                <a href="{{ route('setor.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                                @if (Auth::user()->role == 'agen')
                                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
