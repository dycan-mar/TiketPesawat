<x-layout-customer title="{{ $title }}">
    <div class="card shadow rounded">
        <div class="card-header">
            <h5 class="fw-bold fs-4 px-5">Booking </h5>
        </div>
        <div class="card-body">
            <div class="row px-5">
                @if ($booking->count()<0)
                    <div class="col-md-12">
                    <div class="alert alert-danger text-center" role="alert">
                        <h4 class="alert-heading">Anda Belum Booking penerbangan</h4>
                    </div>

                    @else
                    @foreach ($booking as $b)
                    <div class="col-md-5 col-lg-4 mb-4">
                        <div class="card shadow">
                            <div class="card-header" style="background: linear-gradient(45deg, #1e1075, #0a3090);">
                                <h6 class="pt-1 font-weight-bold text-light">{{ $b->penerbangan->namaMaskapai }}</h6>
                            </div>
                            <div class="card-body">
                                <h5 class="text-secondary fw-bold">Booking Id: <span>{{ $b->id }}</span></h5>
                                <h5>Rute :</h5>
                                <p> {{ $b->penerbangan->asal }} ke {{ $b->penerbangan->tujuan }}</p>
                                <p>Tanggal : {{\Carbon\Carbon::parse($b->penerbangan->tanggalPenerbangan)->format('d M Y') }}</p>
                                <p>Jam Terbang : {{\Carbon\Carbon::parse($b->penerbangan->waktuPenerbangan)->format('H:i') }}</p>
                                <div class="d-flex justify-content-between">
                                    <h6 class="fw-bold">Harga :RP{{ number_format($b->totalHarga,'2',',','.') }}</h6>
                                    <span class="fw-bold">{{ $b->status }}</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('detailBooking',$b->id) }}" class="btn btn-primary">detail</a>
                                    @if ($b->status=='menunggu dibayar')
                                    <button class="btn btn-buy" data-bs-toggle="modal" data-bs-target="#modalPembayaran"
                                        data-id="{{ $b->id }}" data-total="{{ $b->totalHarga }}">Bayar Sekarang</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
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
                        <input type="hidden" id="id" name="idBooking" value="">
                        <h4>Id Booking :<span id="idBooking"></span></h4>
                        <h5 class="text-secondary">Total Harga:</h5>
                        <h3 class="text-success fw-bold"> Rp <span id="totalHarga"></span></h3>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit" type="submit" class="btn btn-primary">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#modalPembayaran').on('show.bs.modal', function(event) {
                var btn = $(event.relatedTarget);

                var id = btn.data('id');
                var totalHarga = btn.data('total');

                $('#id').val(id);
                $('#idBooking').text(id)
                $('#totalHarga').text(totalHarga);
            });
        });
    </script>
</x-layout-customer>