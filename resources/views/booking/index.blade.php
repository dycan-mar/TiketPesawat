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
                            <th>Atas Nama</th>
                            <th>Nama Maskapai</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Jam Berangkat</th>
                            <th>Harga Tiket</th>
                            <th>Jumlah Tiket</th>
                            <th>Harga Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->user->name }}</td>
                            <td>{{ $p->penerbangan->namaMaskapai }}</td>
                            <td>{{ $p->penerbangan->asal }}</td>
                            <td>{{ $p->penerbangan->tujuan }}</td>
                            <td>{{ $p->penerbangan->tanggalBerangkat }}</td>
                            <td>{{ $p->penerbangan->waktuBerangkat }}</td>
                            <td>{{ number_format($p->penerbangan->harga,'2',',','.') }}</td>
                            <td>{{ $p->jumlah }}</td>
                            <td>{{ number_format($p->totalHarga,'2',',','.') }}</td>
                            <td>{{ $p->status }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts>