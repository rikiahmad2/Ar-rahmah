@extends('template.app')

@section('title', '| Akad')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Akad</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('pengajuan.index') }}">Pengajuan</a></div>
                <div class="breadcrumb-item"><a href="{{ route('pengajuan.show', $akad->id_pengajuan) }}">Detail Pengajuan</a></div>
                <div class="breadcrumb-item">Edit Akad</div>
            </div>
        </div>
        <div class="section-body">
            @include('akad.partials._form')
        </div>
    </section>
@endsection
