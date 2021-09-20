<form action="{{ isset($akad) ? route('akad.update', $akad->id) : route('akad.store') }}" method="POST">
    @csrf

    @if(isset($akad))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Akad</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="id_pengajuan">ID Pengajuan</label>
                            <input type="text" class="form-control" name="id_pengajuan" id="id_pengajuan" value="{{ isset($akad) ? $akad->id_pengajuan : $id_pengajuan }}" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ isset($akad) ? $akad->tanggal->format('Y-m-d') : old('tanggal') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="pihak_1">Pihak (1) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pihak_1" id="pihak_1" value="{{ isset($akad) ? $akad->pihak_1 : old('pihak_1') }}" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="alamat_1">Alamat (1) <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="alamat_1" id="alamat_1" required>{{ isset($akad) ? $akad->alamat_1 : old('alamat_1') }}</textarea>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="jaminan">Jaminan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="jaminan" id="jaminan" value="{{ isset($akad) ? $akad->jaminan : old('jaminan') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="pihak_2">Pihak (2) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pihak_2" id="pihak_2" value="{{ isset($akad) ? $akad->pihak_2 : old('pihak_2') }}" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="alamat_2">Alamat (2) <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="alamat_2" id="alamat_2" required>{{ isset($akad) ? $akad->alamat_2 : old('alamat_2') }}</textarea>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ isset($akad) ? $akad->keterangan : old('keterangan') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="harga_beli">Harga Beli <span class="text-danger">*</span></label>
                            <input type="number" min="1" class="form-control" name="harga_beli" id="harga_beli" value="{{ isset($akad) ? $akad->harga_beli : old('harga_beli') }}" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="harga_jual">Harga Jaul <span class="text-danger">*</span></label>
                            <input type="number" min="1" class="form-control" name="harga_jual" id="harga_jual" value="{{ isset($akad) ? $akad->harga_jual : old('harga_jual') }}" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="margin">Margin <span class="text-danger">*</span></label>
                            <input type="number" min="1" class="form-control" name="margin" id="margin" value="{{ isset($akad) ? $akad->margin : old('margin') }}" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('pengajuan.show', (isset($akad) ? $akad->id_pengajuan : $id_pengajuan)) }}" class="btn btn-sm btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>