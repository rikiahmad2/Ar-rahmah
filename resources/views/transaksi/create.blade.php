@extends('template.app')

@section('title', '| Transaksi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></div>
                <div class="breadcrumb-item">Tambah Data Premi</div>
            </div>
        </div>
        <div class="section-body">
            @include('transaksi.partials._form')
        </div>
    </section>
@endsection
