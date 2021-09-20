<form action="{{ isset($anggota) ? route('anggota.update', $anggota->id) : route('anggota.store') }}" method="POST">
    @csrf

    @if(isset($anggota))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Data Peserta Fulnadi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="akad">Akad <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Mudharabah" class="form-control @error('akad') is-invalid @enderror" name="akad" id="akad" value="{{ isset($anggota) ? $anggota->akad : old('akad') }}">
                            @error('akad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="jenisproduk">Jenis Produk <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Takaful Dana Pendidikan (FULNADI)" class="form-control @error('jenisproduk') is-invalid @enderror" name="jenisproduk" id="jenisproduk" value="{{ isset($anggota) ? $anggota->jenisproduk : old('jenisproduk') }}">
                            @error('jenisproduk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="namaanak">Nama Lengkap Anak<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="namaanak" id="namaanak" value="{{ isset($anggota) ? $anggota->namaanak : old('namaanak') }}" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="tglanak">Tanggal Lahir Anak<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tglanak" id="tglanak" value="{{ isset($anggota) ? $anggota->tglanak->format('Y-m-d') : old('tglanak') }}" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="usiaanak">Usia Anak<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="usiaanak" id="usiaanak" value="{{ isset($anggota) ? $anggota->usiaanak : old('usiaanak') }}" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="jkanak">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select name="jkanak" id="jkanak" class="form-control" required>
                                <option {{ (isset($anggota) && $anggota->jenis_kelamin == 'l') || old('jkanak') == 'l' || empty($anggota) ? 'selected' : '' }} value="l">Laki-laki</option>
                                <option {{ (isset($anggota) && $anggota->jenis_kelamin == 'p') || old('jkanak') == 'p' ? 'selected' : '' }} value="p">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <textarea rows="3" class="form-control" name="alamat" id="alamat" required>{{ isset($anggota) ? $anggota->alamat : old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pemegang Polis</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namaortu">Nama Lengkap Orang tua <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="namaortu" id="namaortu" value="{{ isset($anggota) ? $anggota->namaortu : old('namaortu') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tglortu">Tanggal Lahir Orangtua <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tglortu" id="tglortu" value="{{ isset($anggota) ? $anggota->tglortu->format('Y-m-d') : old('tglortu') }}" required>
                        </div>
                        <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="usiaortu">Usia Orangtua <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="usiaortu" id="usiaortu" value="{{ isset($anggota) ? $anggota->usiaortu : old('usiaortu') }}" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="jkortu">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select name="jkortu" id="jkortu" class="form-control" required>
                                <option {{ (isset($anggota) && $anggota->jenis_kelamin == 'l') || old('jkortu') == 'l' || empty($anggota) ? 'selected' : '' }} value="l">Laki-laki</option>
                                <option {{ (isset($anggota) && $anggota->jenis_kelamin == 'p') || old('jkortu') == 'p' ? 'selected' : '' }} value="p">Perempuan</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ isset($anggota) ? $anggota->pekerjaan : old('pekerjaan') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="number" min="1" class="form-control" name="no_telp" id="no_telp" value="{{ isset($anggota) ? $anggota->no_telp : old('no_telp') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ isset($anggota) ? $anggota->email : old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if(isset($anggota))
                        <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                    @else
                        <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
                    @endif
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Data Untuk Takaful</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="standart">Standart <span class="text-danger">*</span></label>
                        <select name="standart" id="standart" class="form-control" required>
                            <option {{ (isset($anggota) && $anggota->standart == 'Y') || old('standart') == 'Y' || empty($anggota) ? 'selected' : '' }} value="Y">Y</option>
                            <option {{ (isset($anggota) && $anggota->standart == 'N') || old('standart') == 'N' ? 'selected' : '' }} value="N">N</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kontribusi">Jumlah Kontribusi<span class="text-danger">*</span></label>
                        <select name="kontribusi" id="kontribusi" class="form-control" required>
                            <option {{ (isset($anggota) && $anggota->kontribusi == 'Yes') || old('kontribusi') == 'Yes' || empty($anggota) ? 'selected' : '' }} value="Yes">Yes</option>
                            <option {{ (isset($anggota) && $anggota->kontribusi == 'No') || old('kontribusi') == 'No' ? 'selected' : '' }} value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carabayar">Cara Bayar<span class="text-danger">*</span></label>
                        <select name="carabayar" id="carabayar" class="form-control" required>
                            <option {{ (isset($anggota) && $anggota->carabayar == 'Tahunan') || old('carabayar') == 'Tahunan' || empty($anggota) ? 'selected' : '' }} value="Tahunan">Tahunan</option>
                            {{-- <option {{ (isset($anggota) && $anggota->carabayar == 'No') || old('carabayar') == 'No' ? 'selected' : '' }} value="No">No</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahapan">Tahapan<span class="text-danger">*</span></label>
                        <select name="tahapan" id="tahapan" class="form-control" required>
                            <option {{ (isset($anggota) && $anggota->tahapan == 'TK') || old('tahapan') == 'TK' || empty($anggota) ? 'selected' : '' }} value="TK">TK</option>
                            <option {{ (isset($anggota) && $anggota->tahapan == 'SD') || old('tahapan') == 'SD' ? 'selected' : '' }} value="SD">SD</option>
                            <option {{ (isset($anggota) && $anggota->tahapan == 'SMP') || old('tahapan') == 'SMP' ? 'selected' : '' }} value="SMP">SMP</option>
                            <option {{ (isset($anggota) && $anggota->tahapan == 'SMA') || old('tahapan') == 'SMA' ? 'selected' : '' }} value="SMA">SMA</option>
                            <option {{ (isset($anggota) && $anggota->tahapan == 'PT') || old('tahapan') == 'PT' ? 'selected' : '' }} value="PT">PT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_agen">Nama Agen<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_agen" id="nama_agen" value="{{ isset($anggota) ? $anggota->nama_agen : old('nama_agen') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_agen">Nomor Agen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_agen" id="no_agen" value="{{ isset($anggota) ? $anggota->no_agen : old('no_agen') }}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
