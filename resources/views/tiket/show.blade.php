<x-layouts>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tiket</h6>
        </div>
        <div class="card-body">
            <h6 class="card-title">Maskapai : {{ $maskapai }}</h6>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Atas Nama</th>
                            <th>id Booking</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tiket as $t)
                        <tr>
                            <td>{{ $t->no }}</td>
                            <td>
                                @if ( $t->user )
                                {{ $t->user->name }}
                                @else
                                Menunggu Pemesanan
                                @endif
                            </td>
                            <td>
                                @if ($t->id_booking)
                                {{ $t->id_booking }}
                                @else
                                Menunggu Pemesanan
                                @endif
                            </td>
                            <td class="@if ($t->status =='dipesan')
                                text-warning
                                @elseif ($t->status == 'dibayar')
                                text-success
                            @endif">{{ $t->status }}</td>
                            <td>
                                @if ($t->status == 'dipesan')
                                <a href="" class="btn btn-secondary">Detail Pesanan</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layouts>