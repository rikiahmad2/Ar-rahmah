@extends('template.app')

@section('title', '| Peserta')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Peserta</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Peserta</a></div>
                <div class="breadcrumb-item">Detail Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Peserta</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Jenis Produk</strong>
                                    <span>{{ $anggota->jenis_produk }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Nama Anak</strong>
                                    <span>{{ $anggota->namaanak }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Tanggal Lahir Anak</strong>
                                    <span>{{ $anggota->tglanak->format('d/m/Y') }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Usia Anak</strong>
                                    <span>{{ $anggota->usiaanak }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Jenis Kelamin</strong>
                                    <span>{{ $anggota->jkanak == 'l' ? 'Laki-laki' : 'Perempuan' }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Alamat</strong>
                                    <span>{{ $anggota->alamat }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Tanggal Input</strong>
                                    <span>{{ $anggota->created_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">

                                <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Nama Orangtua</strong>
                                    <span>{{ $anggota->namaortu }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Tanggal Lahir Orangtua</strong>
                                    <span>{{ $anggota->tglortu->format('d/m/Y') }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Usia Orangtua</strong>
                                    <span>{{ $anggota->usiaortu }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Jenis Kelamin</strong>
                                    <span>{{ $anggota->jkortu }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Pekerjaan</strong>
                                    <span>{{ $anggota->pekerjaan }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>No Handphone</strong>
                                    <span>{{ $anggota->no_telp }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Email</strong>
                                    <span>{{ $anggota->email }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Akad</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Standart</strong>
                                    <span>{{ $anggota->standart == 'Y' ? 'Y' : 'N' }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Jumlah Kontribusi</strong>
                                    <span>{{ $anggota->kontribusi == 'Yes' ? 'Yes' : 'No' }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Cara Bayar</strong>
                                    <span>{{ $anggota->carabayar}}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Tahapan</strong>
                                    <span>{{ $anggota->tahapan}}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Nama Agen</strong>
                                    <span>{{ $anggota->nama_agen }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-wrap justify-content-between">
                                    <strong>Nomor Agen</strong>
                                    <span>{{ $anggota->no_agen }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
