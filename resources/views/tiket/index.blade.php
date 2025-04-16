<x-layouts>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tiket</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($penerbangan->count()<=0)
                    <div class="col-12 d-flex justify-content-center">
                    <h5 class="text-warning">Belum ada Tiket</h5>
            </div>
            @endif
            @foreach ($penerbangan as $p)
            <div class="col-md-4 col-lg-3">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $p->namaMaskapai }}</h6>
                    </div>
                    <div class="card-body">
                        <h5>Rute :</h5>
                        <p> {{ $p->asal }} ke {{ $p->tujuan }}</p>
                        <p>Tanggal : {{\Carbon\Carbon::parse($p->tanggalPenerbangan)->format('d M Y') }}</p>
                        <p>Jam Terbang : {{\Carbon\Carbon::parse($p->waktuPenerbangan)->format('H:i') }}</p>
                        <p>Harga :RP{{ number_format($p->harga,'2',',','.') }}</p>
                        <p>Tiket Tersedia: {{ $p->tiket_tersedia_count }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('tiket.show',$p->id) }}" class="btn btn-primary">Detail Tiket</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="tambahPenerbanganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Penerbangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penerbangan.store') }}" method="post">
                        {{ csrf_field() }}
                        @method('post')
                        <div class="form-group">
                            <label for="">Nama Pesawat</label>
                            <input type="text" name="namaPesawat" id="" class="form-control @error('namaPesawat') is-invalid @enderror"
                                placeholder="Masukkan Nama Pesawat......" value="{{ old('namaPesawat') }}">
                        </div>
                        <div class="d-flex " style="gap: 10px;">
                            <div class="form-group">
                                <label for="">Dari</label>
                                <input type="text" name="asal" id="" class="form-control @error('assal') is-invalid @enderror"
                                    placeholder="Masukkan Asal Penerbangan......" value="{{ old('asal') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Ke</label>
                                <input type="text" name="tujuan" id="" class="form-control @error('tujuan') is-invalid @enderror"
                                    placeholder="Masukkan Tujuan Penerbangan......" value="{{ old('tujuan') }}">
                            </div>
                        </div>
                        <div class="d-flex" style="gap: 15px;">
                            <div class="form-group">
                                <label for="">Tanggal Berangkat</label>
                                <input type="date" name="tanggalBerangkat" id="" class="form-control @error('tanggalBerangkat') is-invalid @enderror"
                                    placeholder="Masukkan Tanggal Berangkat......" value="{{ old('tanggalBerangkat') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Jam Berangkat</label>
                                <input type="time" name="waktuBerangkat" id="" class="form-control @error('waktuBerangkat') is-invalid @enderror"
                                    placeholder="Masukkan Jam Berangkat......" value="{{ old('waktuBerangkat') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Tiket</label>
                            <input type="number" name="harga" id="" class="form-control @error('harga') is-invalid @enderror"
                                placeholder="Masukkan Harga Tiket......" value="{{ old('harga') }}">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts>