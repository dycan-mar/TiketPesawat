<x-layouts>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penerbangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Maskapai</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Jam Berangkat</th>
                            <th>Harga Tiket</th>
                            <th>Kapasitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbangan as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->namaMaskapai }}</td>
                            <td>{{ $p->asal }}</td>
                            <td>{{ $p->tujuan }}</td>
                            <td>{{ $p->tanggalBerangkat }}</td>
                            <td>{{ $p->waktuBerangkat }}</td>
                            <td>{{ number_format($p->harga,'2',',','.') }}</td>
                            <td>{{ $p->kapasitas}}</td>
                            <td class="d-flex " style="gap: 5px;">
                                <a href="{{ route('penerbangan.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('penerbangan.destroy',$p->id) }}" method="post">
                                    {{ csrf_field() }}
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2 w-100 d-flex justify-content-end">
                <button class="btn btn-success " data-toggle="modal" data-target="#tambahPenerbanganModal">Tambah Data</button>
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
                            <label for="">Nama Maskapai</label>
                            <input type="text" name="namaMaskapai" id="" class="form-control @error('namaMaskapai') is-invalid @enderror"
                                placeholder="Masukkan Nama Maskapai......" value="{{ old('namaMaskapai') }}">
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
                        <div class="form-group">
                            <label for="">Kapasitas</label>
                            <input type="number" name="kapasitas" id="" class="form-control @error('kapasitas') is-invalid @enderror"
                                placeholder="Masukkan Kapasitas......" value="{{ old('kapasitas') }}">
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