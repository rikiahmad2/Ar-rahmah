@extends('template.app')

@section('title', '| Peserta')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Peserta</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Peserta</a></div>
                <div class="breadcrumb-item">Edit Data</div>
            </div>
        </div>
        <div class="section-body">
            @include('anggota.partials._form')
        </div>
    </section>
@endsection
