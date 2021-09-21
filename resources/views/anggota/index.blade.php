@extends('template.app')

@section('title', '| Peserta')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Peserta Fulnadi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Peserta</div>
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
                            <a href="{{ route('anggota.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Peserta</h4>
                            <div class="card-header-form">
                                <form method="GET" action="{{ route('anggota.index') }}">
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
                                            <th>Akad</th>
                                            <th>Nama Anak</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Nomor Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach($anggota as $data)
                                        <tr>
                                            <td>{{ $data->akad }}</td>
                                            <td>{{ $data->namaanak }}</td>
                                            <td>{{ $data->namaortu }}</td>
                                            <td>{{ $data->no_telp }}</td>
                                            <td>
                                                <a href="{{ route('anggota.show', $data->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                @if (Auth::user()->role == 'agen')
                                                    <a href="{{ route('anggota.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $anggota->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
