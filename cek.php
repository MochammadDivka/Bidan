<?php require_once('check_login.php');
include_once('head.php');
include_once('pala.php');
include_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pemeriksaan</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Add Materialize CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        section {
            margin: 20px;
        }

        .custom-btn {
            background-color: #6c56f5;
            color: #ffffff;
        }

        .card {
            width: 200px;
            height: 300px;
            /* Atur tinggi card sesuai kebutuhan */
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 20px;
        }


        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- <header>
            <h1>Proses Pemeriksaan</h1>
        </header> -->

        <main>

            <div class="row">
                <section class="col-sm"></section>
            </div>
            <div class="row">
                <section class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Riwayat Kehamilan</h2>
                            <p class="card-text">Isi formulir untuk riwayat kehamilan.</p>
                            <a href="RiwayatKehamilan.php" class="btn waves-effect waves-light custom-btn">
                                <i class="fas fa-edit"></i> Buka Formulir
                            </a>
                        </div>
                    </div>
                </section>

                <section class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Kehamilan Sekarang</h2>
                            <p class="card-text">Isi formulir untuk kehamilan sekarang.</p>
                            <a href="RiwayatKehamilanSekarang.php" class="btn waves-effect waves-light custom-btn">
                                <i class="fas fa-edit"></i> Buka Formulir
                            </a>
                        </div>
                    </div>
                </section>

                <section class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Pemeriksaan</h2>
                            <p class="card-text">Isi formulir untuk proses pemeriksaan.</p>
                            <a href="Pemeriksaan.php" class="btn waves-effect waves-light custom-btn">
                                <i class="fas fa-edit"></i> Buka Formulir
                            </a>
                        </div>
                    </div>
                </section>

                <section class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Status Peserta KB Baru</h2>
                            <p class="card-text">Isi formulir untuk peserta KB baru.</p>
                            <a href="StatusPesertaKBbaru.php" class="btn waves-effect waves-light custom-btn">
                                <i class="fas fa-edit"></i> Buka Formulir
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Repeat the same structure for the next three cards -->



                <section class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Pemeriksaan (Peserta KB)</h2>
                            <p class="card-text">Isi formulir untuk peserta KB baru.</p>
                            <a href="PemeriksaanKB.php" class="btn waves-effect waves-light custom-btn">
                                <i class="fas fa-edit"></i> Buka Formulir
                            </a>
                        </div>
                    </div>
                </section>

                <section class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Kunjungan ulang</h2>
                            <p class="card-text">Isi formulir untuk kunjungan ulang.</p>
                            <a href="kunjungan-ulang.php?setid_kunjungan_ulang=<?php echo $_GET['prosesid'] ?>" class="btn waves-effect waves-light custom-btn">
                                <i class="fas fa-edit"></i> Buka Formulir
                            </a>
                        </div>
                    </div>
                </section>
            </div>

            <div class="row">
                <div class="col-sm-4 mb-4">
                    <a href="formproses.php" class="btn btn-secondary custom-btn">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add Materialize JS script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
</div>
</div>


<?php include_once('footer.php'); ?>