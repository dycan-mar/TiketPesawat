<x-layout-customer title="{{ $title }}">
    <div class="index p-0 m-0">
        <!-- hero -->
        <section id="hero" style="background-image: url('{{ asset("img/hero.jpg") }}')">
            <div class="hero-container">
                <div class="hero-content">
                    <h1>Perjalanan Menjadi Kenangan</h1>
                    <h4>Terbang dengan Nyaman: Layanan Terbaik untuk Setiap Penumpang </h4>
                    <a href="{{ 'search' }}" class="btn btn-cta ">Traveling Sekarang</a>
                </div>
            </div>
        </section>
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
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" name="asal" id="" required>
                                    <option value="">Pilih Kota Asal</option>
                                    @foreach ($penerbangan as $p)
                                    <option value="{{ $p->asal }}">{{ $p->asal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="tujuan" id="" required>
                                    <option value="">Pilih Kota Tujuan</option>
                                    @foreach ($penerbangan as $p)
                                    <option value="{{ $p->tujuan }}">{{ $p->tujuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input name="date" type="date" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-me w-100">Cari Tiket</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Asked Question -->
        <section id="question" class="container-fluid mb-5">
            <div class="question-container d-block justify-content-center mx-5 mb-5 p-3">
                <h4 class="text-center mt-5 mb-3" style="font-weight: bold;">Mengapa harga tiket pesawat Kami lebih murah?
                </h4>
                <div class="d-flex justify-content-center mt-4 px-5 mx-3" style="gap: 5rem;">
                    <div class="col-3 text-center px-3">
                        <img class="img-fluid" width="150" src="{{ asset('img/aman.webp') }}" alt="">
                        <h5 class="fw-bold">Jaminan Aman Transaksi Online
                        </h5>
                        <p class="fw-semibold">Teknologi SSL dari RapidSSL dengan Sertifikat yang terotentikasi menjamin privasi dan keamanan transaksi online Anda. Konfirmasi instan dan e-tiket dikirim ke email Anda.
                        </p>
                    </div>
                    <div class="col-3 text-center px-3">
                        <img class="img-fluid" width="150" src="{{ asset('img/pembayaran.webp') }}" alt="">
                        <h5 class="fw-bold">Berbagai Pilihan Pembayaran
                        </h5>
                        <p class="fw-semibold">Pembelian tiket menjadi semakin fleksibel dengan berbagai pilihan pembayaran, dari Transfer ATM, Kartu Kredit, hingga Internet Banking.
                        </p>
                    </div>
                    <div class="col-3 text-center px-3">
                        <img class="img-fluid" width="150" src="{{ asset('img/pencarian.webp') }}" alt="">
                        <h5 class="fw-bold">Sistem Pencarian Cerdas
                        </h5>
                        <p class="fw-semibold">Kami berusaha mencari tiket pesawat terbaik dari segi harga, lama perjalanan, waktu terbang, kombinasi maskapai, dan lain-lain, dengan teknologi terbaru.
                        </p>
                    </div>
                </div>
            </div>
            <div class="question-container text-center px-5 mx-5">
                <h5 class="fw-bold">Mengapa mencari harga & promo tiket pesawat di Kami?
                </h5>
                <p class="text-start fw-semibold px-5">Kami menampilkan harga tiket pesawat murah yang telah dianalisa dan diolah dari jaringan sumber-sumber resmi. Kami adalah website pencarian tiket pesawat online Terbaik . Yuk, segera pesan <span class="fw-bold"> tiket pesawat murah promo </span> hanya di Traveloka sekarang juga!
                </p>
            </div>
        </section>
    </div>

</x-layout-customer>