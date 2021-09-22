<form action="{{ isset($setor) ? route('setor.update', $setor->id) : route('setor.store') }}" method="POST">
    @csrf

    @if(isset($setor))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembayaran Premi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="idpolis">Nama Orang Tua <span class="text-danger">*</span></label>
                            <select class="form-control" name="idpolis" id="idpolis" required>
                                <option value="">Pilih Peserta</option>
                                @foreach($anggota as $a)
                                <option {{ (isset($Setor) && $Setor->idpolis == $a->id) || old('idpolis') == $a->id ? 'selected' : '' }} value="{{ $a->id }}">{{ $a->namaortu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="namaanak">Nama Anak<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="namaanak" id="namaanak" value="{{ isset($setor) ? $setor->namaanak : old('namaanak') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="paketkontribusi">Kontribusi <span class="text-danger">*</span></label>
                            <select name="paketkontribusi" id="paketkontribusi" class="form-control" required>
                                <option {{ (isset($setor) && $setor->paketkontribusi == '1000000') || old('paketkontribusi') == '1000000' || empty($setor) ? 'selected' : '' }} value="1000000">Rp. 1.000.000,- /Tahun</option>
                                {{-- <option {{ (isset($setor) && $setor->paket_takaful == '8000000') || old('paket_takaful') == '8000000' ? 'selected' : '' }} value="8000000">Rp. 8.000.000,- Selama Perjanjian</option> --}}
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="masaperjanjian">Masa Perjanjian <span class="text-danger">*</span></label>
                            <select name="masaperjanjian" id="masaperjanjian" class="form-control" required>
                                <option {{ (isset($setor) && $setor->masaperjanjian == '5 ') || old('masaperjanjian') == '5' || empty($setor) ? 'selected' : '' }} value="5">5 Tahun</option>
                                <option {{ (isset($setor) && $setor->masaperjanjian == '6') || old('masaperjanjian') == '6' ? 'selected' : '' }} value="6">6 Tahun</option>
                                <option {{ (isset($setor) && $setor->masaperjanjian == '12') || old('masaperjanjian') == '12' ? 'selected' : '' }} value="12">12 Tahun</option>
                                <option {{ (isset($setor) && $setor->masaperjanjian == '15') || old('masaperjanjian') == '15' ? 'selected' : '' }} value="15">15 Tahun</option>
                                <option {{ (isset($setor) && $setor->masaperjanjian == '18') || old('masaperjanjian') == '18' ? 'selected' : '' }} value="18">18 Tahun</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="carabayar">Cara Bayar <span class="text-danger">*</span></label>
                            <select name="carabayar" id="carabayar" class="form-control" required>
                                <option {{ (isset($setor) && $setor->cara_bayar == '1') || old('carabayar') == '1' ? 'selected' : '' }} value="1">Tahunan</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="mta">Manfaat Takaful Awal (MTA)<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mta" id="mta" value="{{ isset($setor) ? $setor->mta : old('mta') }}" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="persentabarru">Persentase Tabarru<span class="text-danger">*</span></label>
                            <select name="persentabarru" id="persentabarru" class="form-control" required>
                                <option {{ (isset($setor) && $setor->persentabarru == '0,123') || old('persentabarru') == '0,123' ? 'selected' : '' }} value="0.123">12,3%</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="jmlhtabarru">Tabarru<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="jmlhtabarru" id="jmlhtabarru" value="{{ isset($setor) ? $setor->jmlhtabarru : old('jmlhtabarru') }}" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="jmlhtabarru">Bagi Hasil<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="bagihasil" id="bagihasil" value="{{ isset($setor) ? $setor->jmlhtabarru : old('jmlhtabarru') }}" readonly>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if(isset($setor))
                    <a href="{{ route('setor.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                    @else
                    <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
                    @endif
                    <button type="button" onclick="calc()" class="btn btn-sm btn-success in-line">Hitung</button>
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                    <h1 class="test"></h1>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    function calc(){
        var paketkontribusi = $("#paketkontribusi").val();
        var masaperjanjian = $("#masaperjanjian").val();
        var carabayar = $("#carabayar").val();
        var persentabarru = $("#persentabarru").val();

        $("#bagihasil").val(paketkontribusi*8/100*85/100);
        $("#mta").val(paketkontribusi*masaperjanjian/carabayar);
        $("#jmlhtabarru").val(persentabarru*paketkontribusi);
    }
</script>



