<x-layout-customer title="{{ $title }}">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Form Pencarian -->
    <section id="search" class="container-fluid">
        <div class="search-container d-block justify-content-center align-items-center">
            <div class="d-block">

                <h4 class="text-center mt-5 mb-3" style="font-weight: bold;">Cari Tiket Pesawat Murah
                </h4>
                <p class="text-center">Temukan tiket pesawat murah dan promo dari berbagai maskapai terkemuka di Indonesia
                    dan dunia. Pesan tiket pesawat online sekarang juga!</p>
            </div>
            <div class="container my-5">
                <form action="{{ route('cariTiket') }}" method="post">
                    @method('post')
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="asal" id="">
                                <option value="">Pilih Kota Asal</option>
                                @foreach ($penerbangan as $p)
                                <option value="{{ $p->asal }}">{{ $p->asal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="tujuan" id="">
                                <option value="">Pilih Kota Tujuan</option>
                                @foreach ($penerbangan as $p)
                                <option value="{{ $p->tujuan }}">{{ $p->tujuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input name="date" type="date" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-me w-100">Cari Tiket</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="tiket">
        <div class="container mx-5 px-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background: linear-gradient(45deg, #1e1075, #0a3090);">
                    <h6 class=" m-0 font-weight-bold text-light">Hasil Pencarian</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if ($penerbangan->isEmpty())
                        <div class="col-md-12">
                            <div class="alert alert-danger text-center" role="alert">
                                <h4 class="alert-heading">Data Tidak Ditemukan!</h4>
                                <p>Silahkan cari tiket pesawat yang lain</p>
                            </div>
                        </div>
                        @else
                        @foreach ($penerbangan as $p)
                        <div class="col-md-5 col-lg-4 mb-4">
                            <div class="card shadow">
                                <div class="card-header" style="background: linear-gradient(45deg, #1e1075, #0a3090);">
                                    <h6 class=" m-0 font-weight-bold text-light">{{ $p->namaMaskapai }}</h6>
                                </div>
                                <div class="card-body">
                                    <h5>Rute :</h5>
                                    <p> {{ $p->asal }} ke {{ $p->tujuan }}</p>
                                    <p>Tanggal : {{\Carbon\Carbon::parse($p->tanggalPenerbangan)->format('d M Y') }}</p>
                                    <p>Jam Terbang : {{\Carbon\Carbon::parse($p->waktuPenerbangan)->format('H:i') }}</p>
                                    <p>Tiket Tersedia: {{ $p->tiket_tersedia_count }}</p>
                                    <p class="fw-bold">Harga :RP{{ number_format($p->harga,'2',',','.') }}</p>
                                </div>
                                <div class="card-footer text-center" style="gap: 10px;">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-booking" data-bs-toggle="modal" data-bs-target="#modalBooking"
                                            data-id="{{ $p->id }}"
                                            data-maskapai="{{ $p->namaMaskapai }}"
                                            data-asal="{{ $p->asal}}"
                                            data-tujuan="{{ $p->tujuan }}"
                                            data-harga="{{ $p->harga }}"
                                            data-Tersedia="{{ $p->tiket_tersedia_count }}"
                                            data-tanggal="{{\Carbon\Carbon::parse($p->tanggalPenerbangan)->format('d M Y') }}"
                                            data-waktu="{{ \Carbon\Carbon::parse($p->waktuPenerbangan)->format('H:i') }}">Booking</button>
                                        <button class="btn btn-buy"
                                            data-bs-toggle="modal" data-bs-target="#modalPembayaran"
                                            data-id="{{ $p->id }}"
                                            data-maskapai="{{ $p->namaMaskapai }}"
                                            data-asal="{{ $p->asal}}"
                                            data-tujuan="{{ $p->tujuan }}"
                                            data-harga="{{ $p->harga }}"
                                            data-Tersedia="{{ $p->tiket_tersedia_count }}"
                                            data-tanggal="{{\Carbon\Carbon::parse($p->tanggalPenerbangan)->format('d M Y') }}"
                                            data-waktu="{{ \Carbon\Carbon::parse($p->waktuPenerbangan)->format('H:i') }}">Beli Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- modal -->
    <div class="modal fade" id="modalBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Booking Tiket</strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postBooking') }}" method="post">
                        {{ csrf_field() }}
                        @method('post')
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="totalHarga" name="totalHarga">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-secondary">Maskapai</h5>
                                <h4 id="bookingMaskapai"></h4>
                                <p><strong>Asal:</strong> <span id="bookingAsal"></span></p>
                                <p><strong>Tujuan:</strong><span id="bookingTujuan"></span></p>
                                <p><strong>Tanggal Berangkat:</strong><span id="bookingTanggal"></span></p>
                                <p><strong>waktu Berangkat:</strong><span id="bookingWaktu"></span></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-secondary">Harga</h5>
                                <h3 class="text-success fw-bold"> Rp<span id="bookingHarga"></span></h3>
                                <h6 class="mt-4 text-muted">Kursi Tersedia :<span id="bookingKapasitas"></span></h6>
                                <div class="form-group mt-3 text-start">
                                    <label for="jumlahTiket" class="form-label fw-semibold">Jumlah Tiket</label>
                                    <input type="number" name="jumlah_tiket" id="jumlahTiket" class="form-control" min="1" required>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label fw-semibold">Total Harga</label>
                                    <h4 class="text-danger fw-bold"><span id="bookingTotal">0</span></h4>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modalPembayaran -->
    <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Beli Tiket</strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postBeli') }}" method="post">
                        {{ csrf_field() }}
                        @method('post')
                        <input type="hidden" id="idbeli" name="id">
                        <input type="hidden" id="totalHargaBeli" name="totalHarga">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-secondary">Maskapai</h5>
                                <h4 id="beliMaskapai"></h4>
                                <p><strong>Asal:</strong> <span id="beliAsal"></span></p>
                                <p><strong>Tujuan:</strong><span id="beliTujuan"></span></p>
                                <p><strong>Tanggal Berangkat:</strong><span id="beliTanggal"></span></p>
                                <p><strong>waktu Berangkat:</strong><span id="beliWaktu"></span></p>
                                <h6 class="mt-4 text-muted">Kursi Tersedia :<span id="beliKapasitas"></span></h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-secondary">Harga</h5>
                                <h3 class="text-success fw-bold"> Rp<span id="beliHarga"></span></h3>
                                <div class="form-group mt-3 text-start">
                                    <label for="jumlahTiket" class="form-label fw-semibold">Jumlah Tiket</label>
                                    <input type="number" name="jumlah_tiket" id="jumlahBeliTiket" class="form-control" min="1" required>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label fw-semibold">Total Harga</label>
                                    <h4 class="text-danger fw-bold"><span id="beliTotal">0</span></h4>
                                </div>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // beli
            $('#modalPembayaran').on('show.bs.modal', function(event) {
                var btn = $(event.relatedTarget);

                var id = btn.data('id');
                var maskapai = btn.data('maskapai');
                var asal = btn.data('asal');
                var tujuan = btn.data('tujuan');
                var harga = btn.data('harga')
                var tiketTersedia = btn.data('Tersedia');
                var tanggal = btn.data('tanggal');
                var waktu = btn.data('waktu');

                $('#idbeli').val(id);
                $('#beliMaskapai').text(maskapai);
                $('#beliAsal').text(asal);
                $('#beliTujuan').text(tujuan);
                $('#beliTanggal').text(tanggal);
                $('#beliWaktu').text(waktu);
                $('#beliHarga').text(harga);
                $('#beliKapasitas').text(tiketTersedia)
                $('#jumlahBeliTiket').change(function() {
                    var total = parseInt($('#jumlahBeliTiket').val()) * parseInt(harga)
                    $('#beliTotal').text(total.toLocaleString('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }));
                    $('#totalHargaBeli').val(total);
                });
            });
            // booking
            $('#modalBooking').on('show.bs.modal', function(event) {
                var btn = $(event.relatedTarget);

                var id = btn.data('id');
                var maskapai = btn.data('maskapai');
                var asal = btn.data('asal');
                var tujuan = btn.data('tujuan');
                var harga = btn.data('harga')
                var tiketTersedia = btn.data('Tersedia');
                var tanggal = btn.data('tanggal');
                var waktu = btn.data('waktu');
                console.log(tiketTersedia)

                $('#id').val(id);
                $('#bookingMaskapai').text(maskapai);
                $('#bookingAsal').text(asal);
                $('#bookingTujuan').text(tujuan);
                $('#bookingTanggal').text(tanggal);
                $('#bookingWaktu').text(waktu);
                $('#bookingHarga').text(harga);
                $('#bookingKapasitas').text(tiketTersedia)
                $('#jumlahTiket').change(function() {
                    var total = parseInt($('#jumlahTiket').val()) * parseInt(harga)
                    $('#bookingTotal').text(total.toLocaleString('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }));
                    $('#totalHarga').val(total);
                });


            });
        });
    </script>
</x-layout-customer>