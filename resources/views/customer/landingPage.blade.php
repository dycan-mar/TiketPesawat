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
    <style>
        #hero {
            background-size: cover;
            /* filter: brightness(0.4); */
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        #hero .hero-container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            backdrop-filter: brightness(50%);
            width: 100%;
            height: 100%;
            /* background-color: aqua; */
            color: #000000;
            /* padding: 2rem; */
        }

        #hero .hero-container .hero-content {
            display: block;
            /* background-color: #000000; */
        }

        #hero .hero-container .hero-content h1,
        #hero .hero-container .hero-content h4 {
            color: #ffffff;
        }

        #hero .btn-cta {
            margin-top: 1rem;
            background: linear-gradient(45deg, #1e1075, #0a3090);
            color: #fff;
            border: none;
            padding: 12px 30px;
            font-size: 1.2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 15px rgba(5, 43, 232, 0.5);
            position: relative;
            overflow: hidden;
        }

        #hero .btn-cta:hover {
            transform: scale(1.05);
            /* color: #111111; */
            font-weight: bold;
        }

        /* Efek overlay animasi saat hover */
        #hero .btn-cta::before {
            content: "";
            position: absolute;
            width: 120%;
            height: 100%;
            top: 0;
            left: -100%;
            background: rgba(255, 255, 255, 0.15);
            transform: skewX(-20deg);
            transition: all 0.5s ease;
            opacity: 0;
        }

        #hero .btn-cta:hover::before {
            opacity: 1;
            left: 100%;
        }
    </style>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <script src={{ asset("vendor/jquery/jquery.min.js") }}></script>
</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="">
                    <!-- hero -->
                    <section id="hero" style="background-image: url('{{ asset("img/hero.jpg") }}')">
                        <div class="hero-container">
                            <div class="hero-content">
                                <h1>Selamat Datang</h1>
                                <h4>Selamat Datang di Aplikasi Tiket Pesawat Kami , Harap Login Terlebih Dahulu </h4>
                                <a href="{{ route('login') }}" class="btn btn-cta ">Login Sekarang</a>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>

</html>