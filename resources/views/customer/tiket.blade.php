<x-layout-customer title="{{ $title }}">

    <div class="card shadow rounded">
        <div class="card-header">
            <h5 class="fw-bold fs-4 px-5">Tiket anda</h5>
        </div>
        <div class="card-body">
            <div class="row px-5">
                @if ($tiket->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-danger text-center" role="alert">
                        <h4 class="alert-heading">Anda Tidak Memiliki tiket!</h4>
                    </div>
                </div>
                @else
                @foreach ($tiket as $t)
                <div class="col-md-5 col-lg-4 mb-4">
                    <div class="card shadow">
                        <div class="card-header" style="background: linear-gradient(45deg, #1e1075, #0a3090);">
                            <h6 class="pt-1 font-weight-bold text-light">{{ $t->penerbangan->namaMaskapai }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-block">
                                    <h5 class="text-secondary fw-bold">Tiket Id: <span>{{ $t->id }}</span></h5>
                                </div>
                                <div class="d-block">
                                    <h5>NO: <span>{{ $t->no }}</span></h5>
                                </div>
                            </div>
                            <h5>ID Booking <span>{{ $t->id_booking }}</span></h5>
                            <h5>Rute :</h5>
                            <p> {{ $t->penerbangan->asal }} ke {{ $t->penerbangan->tujuan }}</p>
                            <p>Tanggal : {{\Carbon\Carbon::parse($t->penerbangan->tanggalPenerbangan)->format('d M Y') }}</p>
                            <p>Jam Terbang : {{\Carbon\Carbon::parse($t->penerbangan->waktuPenerbangan)->format('H:i') }}</p>
                            <p class="fw-bold">Harga :RP{{ number_format($t->penerbangan->harga,'2',',','.') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout-customer>