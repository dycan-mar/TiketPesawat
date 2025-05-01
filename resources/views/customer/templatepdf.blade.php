<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src={{ asset("vendor/jquery/jquery.min.js") }}></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="">
                    <div class="container">
                        <div class="card shadow rounded mt-4">
                            <div class="card-header">
                                <h4 class="fw-bold">Struk transaksi</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="text-secondary">Maskapai :</h5>
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

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>

</html>