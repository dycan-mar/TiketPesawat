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
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->booking->user->name }}</td>
                            <td>{{ $p->booking->penerbangan->namaMaskapai }}</td>
                            <td>{{ $p->booking->penerbangan->asal }}</td>
                            <td>{{ $p->booking->penerbangan->tujuan }}</td>
                            <td>{{ $p->booking->penerbangan->tanggalBerangkat }}</td>
                            <td>{{ number_format($p->booking->totalHarga,'2',',','.') }}</td>
                            <td>
                                <!-- Button Trigger -->
                                <button type="button" id="trigger" class="btn btn-success" data-toggle="modal" data-target="#strukModal" data-datas="{{$p}}">
                                    Lihat Struk
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="strukModal" tabindex="-1" aria-labelledby="strukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="strukModalLabel">Struk Pembayaran</h5>
                </div>
                <div class="modal-body">
                    <div class="receipt " style="font-family: Arial, sans-serif;">
                        <div class="row ">
                            <p class="col-6"><strong>nama:</strong> <span id="nama"></span></p>
                            <p class="col-6"><strong>user id:</strong> <span id="idUser"></span></p>
                        </div>
                        <p><strong>Maskapai:</strong> <span id="maskapai"></span></p>
                        <p><strong>Pembayaran ID:</strong> <span id="idPembayaran"></span> </p>
                        <p><strong>Booking ID:</strong> <span id="idBooking"></span> </p>
                        <p><strong>Rute:</strong> <span id="asal"></span> ke <span id="tujuan"></span></p>
                        <p><strong>Tanggal Penerbangan:</strong> <span id="tanggalBerangkat"></span> </p>
                        <p><strong>Jam Terbang:</strong> <span id="jamBerangkat"></span> </p>
                        <hr>
                        <h5 class="text-end">Total Bayar: <span class="text-success" id="total"></span></h5>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#trigger').on('click', function(e) {
                data = $(this).data('datas')
                console.log(data);
                $('#nama').text(data.booking.user.name)
                $('#idUser').text(data.booking.user.id)
                $('#maskapai').text(data.booking.penerbangan.namaMaskapai)
                $('#idPembayaran').text(data.id)
                $('#idBooking').text(data.booking.id)
                $('#asal').text(data.booking.penerbangan.asal)
                $('#tujuan').text(data.booking.penerbangan.tujuan)
                $('#tanggalBerangkat').text(data.booking.penerbangan.tanggalBerangkat)
                $('#jamBerangkat').text(data.booking.penerbangan.waktuBerangkat)
                $('#total').text("Rp." + data.booking.totalHarga)
            });
        });
    </script>

</x-layouts>