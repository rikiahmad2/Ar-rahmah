@extends('template.app')

@section('title', '| Transaksi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Transaksi</div>
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
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Transaksi</h4>
                            <div class="card-header-form">
                                <form method="GET" action="{{ route('transaksi.index') }}">
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
                                            <th>ID Angsuran</th>
                                            <th>Nama Pemegang</th>
                                            <th>Jumlah Premi</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach($transaksi as $data)
                                        <tr>
                                            <td>{{ $data->idpolis }}</td>
                                            <td>{{ $data->namaortu }}</td>
                                            <td>{{ 'Rp '.number_format($data->premi) }}</td>
                                            <td>{{ $data->tanggal->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $transaksi->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
