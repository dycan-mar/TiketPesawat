<x-layouts>
    <main class="content">
        <h1>Selamat Datang, Admin!</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pengguna</h5>
                        <p class="card-text">Jumlah pengguna: {{$pengguna}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Penjualan</h5>
                        <p class="card-text">Total penjualan: Rp {{ number_format($penjualan,'2',',','.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts>