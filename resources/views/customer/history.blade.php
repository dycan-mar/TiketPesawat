<x-layout-customer title="{{ $title }}">
    <div class="card shadow rounded">
        <div class="card-header">
            <h5 class="fw-bold fs-5 px-5">History</h5>
        </div>
        <div class="card-body">
            <div class="row px-5">
                @if ($pembayaran->count()<0)
                    <div class="col-md-12">
                    <div class="alert alert-danger text-center" role="alert">
                        <h4 class="alert-heading">Anda Belum Melakukan Transaksi</h4>
                    </div>
                    @else
                    @foreach ($pembayaran as $p)
                    <div class="col-md-5 col-lg-4 mb-4">
                        <div class="card shadow">
                            <div class="card-header" style="background: linear-gradient(45deg, #1e1075, #0a3090);">
                                <h6 class="pt-1 font-weight-bold text-light">{{ $p->booking->penerbangan->namaMaskapai }}</h6>
                            </div>
                            <div class="card-body">
                                <h5 class="text-secondary fw-bold">Pembayaran Id: <span>{{ $p->id }}</span></h5>
                                <h5 class="text-secondary fw-bold">Booking Id: <span>{{ $p->booking->id }}</span></h5>
                                <h5>Rute :</h5>
                                <p> {{ $p->booking->penerbangan->asal }} ke {{ $p->booking->penerbangan->tujuan }}</p>
                                <p>Tanggal : {{\Carbon\Carbon::parse($p->booking->penerbangan->tanggalPenerbangan)->format('d M Y') }}</p>
                                <p>Jam Terbang : {{\Carbon\Carbon::parse($p->booking->penerbangan->waktuPenerbangan)->format('H:i') }}</p>
                                <div class="d-flex justify-content-between">
                                    <h6 class="fw-bold">Harga :RP{{ number_format($p->booking->totalHarga,'2',',','.') }}</h6>
                                    <span class="fw-bold">{{ $p->status }}</span>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('detailHistory',$p->booking->id) }}" class="btn btn-primary">detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
            </div>
        </div>
    </div>


</x-layout-customer>