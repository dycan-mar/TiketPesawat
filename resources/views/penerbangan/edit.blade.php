<x-layouts>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Penerbangan</h6>
            <br>

            <form action="{{ route('penerbangan.update',$penerbangan->id) }}" method="post">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label for="">Nama Maskapai</label>
                    <input type="text" name="namaMaskapai" id="" class="form-control @error('namaMaskapai') is-invalid @enderror"
                        placeholder="Masukkan Nama Maskapai......" value="{{$penerbangan->namaMaskapai}}">
                </div>
                <div class="d-flex " style="gap: 10px;">
                    <div class="form-group">
                        <label for="">Dari</label>
                        <input type="text" name="asal" id="" class="form-control @error('assal') is-invalid @enderror"
                            placeholder="Masukkan Asal Penerbangan......" value="{{ $penerbangan->asal }}">
                    </div>
                    <div class="form-group">
                        <label for="">Ke</label>
                        <input type="text" name="tujuan" id="" class="form-control @error('tujuan') is-invalid @enderror"
                            placeholder="Masukkan Tujuan Penerbangan......" value="{{ $penerbangan->tujuan }}">
                    </div>
                </div>
                <div class="d-flex" style="gap: 15px;">
                    <div class="form-group">
                        <label for="">Tanggal Berangkat</label>
                        <input type="date" name="tanggalBerangkat" id="" class="form-control @error('tanggalBerangkat') is-invalid @enderror"
                            placeholder="Masukkan Tanggal Berangkat......" value="{{ $penerbangan->tanggalBerangkat }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Berangkat</label>
                        <input type="time" name="waktuBerangkat" id="" class="form-control @error('waktuBerangkat') is-invalid @enderror"
                            placeholder="Masukkan Jam Berangkat......" value="{{ $penerbangan->waktuBerangkat }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Harga Tiket</label>
                    <input type="number" name="harga" id="" class="form-control @error('harga') is-invalid @enderror"
                        placeholder="Masukkan Harga Tiket......" value="{{ $penerbangan->harga }}">
                </div>
                <div class="form-group">
                    <label for="">Kapasitas</label>
                    <input type="number" name="kapasitas" id="" class="form-control @error('kapasitas') is-invalid @enderror"
                        placeholder="Masukkan Kapasitas......" value="{{ $penerbangan->kapasitas }}">
                </div>
        </div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"
                name="submit">SIMPAN</button>
            </form>
        </div>
    </div>

</x-layouts>