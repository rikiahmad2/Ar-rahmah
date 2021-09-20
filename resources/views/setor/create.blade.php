@extends('template.app')

@section('title', '| Premi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran FULNADI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('setor.index') }}">Premi</a></div>
                <div class="breadcrumb-item">Tambah Data Premi</div>
            </div>
        </div>
        <div class="section-body">
            @include('setor.partials._form')
        </div>
    </section>
@endsection
