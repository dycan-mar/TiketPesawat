<x-layout-customer title="{{ $title }}">
    <div class="container">
        <div class="card shadow rounded mt-4">
            <div class="card-header">
                <h4 class="fw-bold">Detail Booking</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-secondary">Maskapai</h5>
                        <h4 id="bookingMaskapai">{{ $booking->penerbangan->namaMaskapai }}</h4>
                        <p><strong>Asal:</strong> {{ $booking->penerbangan->asal }}</p>
                        <p><strong>Tujuan:</strong>{{ $booking->penerbangan->tujuan}}</p>
                        <p><strong>Tanggal Berangkat:</strong>{{\Carbon\Carbon::parse($booking->penerbangan->tanggalPenerbangan)->format('d M Y') }}</p>
                        <p><strong>waktu Berangkat:</strong>{{\Carbon\Carbon::parse($booking->penerbangan->waktuPenerbangan)->format('H:i') }}</p>
                        <p><strong>Jumlah Tiket: </strong> {{ $booking->jumlah }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-secondary">Total Harga</h5>
                        <h3 class="text-success fw-bold"> Rp {{ $booking->totalHarga }}</h3>
                        <p><strong>Status: </strong>{{ $booking->status }}</p>
                        @if ($booking->status=='menunggu dibayar')
                        <button class="btn btn-buy" data-bs-toggle="modal" data-bs-target="#modalPembayaran">Bayar Sekarang</button>
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <h5 class="text-secondary fw-bold mt-2 ">Tiket Anda</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>nama Maskapai</th>
                                <th>Nomor Tiket </th>
                                <th>Id Tiket </th>
                                <th>idUser</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tiket as $t)
                            <tr>
                                <td>{{ $t->penerbangan->namaMaskapai }}</td>
                                <td>{{ $t->no }}</td>
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->idUser }}</td>
                                <td>{{ $t->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Pembayaran</strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postPembayaran') }}" method="post">
                        {{ csrf_field() }}
                        @method('post')
                        <input type="hidden" id="id" name="idBooking" value="{{ $booking->id }}">
                        <h4>Id Booking {{ $booking->id }}</h4>
                        <h5 class="text-secondary">Total Harga</h5>
                        <h3 class="text-success fw-bold"> Rp {{ $booking->totalHarga }}</h3>
                        <div class="form-group">
                            <label class="form-label" for="">Metode Pembayaran</label>
                            <select class="form-control" name="metodePembayaran" id="" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="DANA">DANA</option>
                                <option value="Gopay">GoPay</option>
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="Mandiri">Mandiri</option>
                            </select>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submit" type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>


</x-layout-customer>