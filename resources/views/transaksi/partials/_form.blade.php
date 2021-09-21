<form action="{{ isset($transaksi) ? route('transaksi.update', $transaksi->id) : route('transaksi.store') }}" method="POST">
    @csrf

    @if(isset($transaksi))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Setor Premi</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <strong>ID Transaksi</strong>
                            <span>{{ $angsuran->id }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <strong>ID Polis</strong>
                            <span>{{ $angsuran->idpolis }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <strong>Nama Orang Tua</strong>
                            <span>{{ $angsuran->namaortu }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <strong>Paket Kontribusi</strong>
                            <span>{{ $angsuran->paketkontribusi }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <strong>Jumlah Pembayaran Selama Masa Perjanjian </strong>
                            <span>{{ $angsuran->mta }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <strong>Bagi Hasil</strong>
                            <span>{{ 'Rp '.number_format($angsuran->bagihasil) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Transaksi</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id_angsuran" value="{{ $angsuran->id }}">
                    <div class="form-group">
                        <label for="idtransaksi">ID Transaksi <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="idtransaksi" id="idtransaksi" value="{{ old('idtransaksi') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="namaortu">Nama Orang Tua<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="namaortu" id="namaortu" value="{{ old('namaortu') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="idpolis">ID Polis<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="idpolis" id="idpolis" value="{{ old('idpolis') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="premi">Premi <span class="text-danger">*</span></label>
                        <input type="number" min="1" class="form-control" name="premi" id="premi" value="{{ old('premi') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ old('keterangan') }}">
                    </div>
                </div>
                <div class="card-footer">
                    @if(isset($transaksi))
                    <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                    @else
                    <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
                    @endif
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
