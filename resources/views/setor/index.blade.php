@extends('template.app')

@section('title', '| Setoran Premi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setor Premi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Setoran Premi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="mb-3 text-right">
                        @if (Auth::user()->role == 'agen')
                        <a href="{{ route('setor.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data Premi</a>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Setoran Premi</h4>
                            <div class="card-header-form">
                                <form method="GET" action="{{ route('setor.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="q" value="{{ $q }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Polis</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Paket FULNADI yang Dipilih</th>
                                            <th>Sisa Angsuran</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach($setor as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->idpolis }}</td>
                                            <td>{{ $data->namaortu }}</td>
                                            <td>{{ 'Rp '.number_format($data->paketkontribusi) }}</td>
                                            <td>{{ 'Rp '.number_format($data->sisa_angsuran) }}</td>
                                            <td>
                                                <a href="{{ route('setor.show', $data->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                @if (Auth::user()->role == 'keuangan')
                                                <a href="{{ route('transaksi.create', $data->id) }}" class="btn btn-sm btn-primary">Tambah Transaksi</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $setor->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
