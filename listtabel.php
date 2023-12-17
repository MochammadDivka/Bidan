<?php require_once('check_login.php');
include_once('head.php');
include_once('pala.php');
include_once('connect.php');

session_start();
if ($_GET['patientid']) {
    $_SESSION['riwayat-patient_patientid'] = $_GET['patientid'];
} else {
    if (!isset($_SESSION['riwayat-patient_patientid']) && $_SESSION['riwayat-patient_patientid'] == null) {
        header('view-patient.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Riwayat Pasien</title>
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
            <div class="pcoded-content">
                <div class="pcoded-inner-content">

                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            <div class="d-inline">
                                                <h3>Tabel Riwayat Pasien</h3>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="index.php"> <i class="feather icon-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="formproses.php">Proses</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="proses.php">Tabel
                                                        Pasien</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page-body">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline">
                                            <h4>Tabel Pasien</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <section class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2 class="card-title">Riwayat Kehamilan</h2>
                                                <p class="card-text">Lihat data riwayat kehamilan.</p>
                                                <a href="tabelrk.php" class="btn btn-primary custom-btn">
                                                    <i class="fas fa-edit"></i> Buka
                                                </a>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2 class="card-title">Pemeriksaan Kehamilan </h2>
                                                <p class="card-text">Lihat data riwayat Pemeriksaan kehamilan.</p>
                                                <a href="tabelKS.php" class="btn btn-primary custom-btn">
                                                    <i class="fas fa-edit"></i> Buka
                                                </a>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2 class="card-title">
                                                    Kunjungan Ulang
                                                </h2>
                                                <p class="card-text">Lihat data kunjungan ulang pasien.
                                                </p>
                                                <a href="tabelKU.php" class="btn btn-primary custom-btn">
                                                    <i class="fas fa-edit"></i> Buka
                                                </a>
                                            </div>
                                        </div>
                                    </section>
                                    <?php if ($_SESSION['user'] == 'doctor') { ?>
                                        <section class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="card-title">
                                                        Pemeriksaan (Kesehatan)
                                                    </h2>
                                                    <p class="card-text">Lihat data riwayat pemeriksaan pasien.
                                                    </p>
                                                    <a href="tabelP.php" class="btn btn-primary custom-btn">
                                                        <i class="fas fa-edit"></i> Buka
                                                    </a>
                                                </div>
                                            </div>
                                        </section>

                                        <section class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="card-title">
                                                        Pemeriksaan (Kehamilan)
                                                    </h2>
                                                    <p class="card-text">Lihat data riwayat pemeriksaan pasien.
                                                    </p>
                                                    <a href="tabelPK.php" class="btn btn-primary custom-btn">
                                                        <i class="fas fa-edit"></i> Buka
                                                    </a>
                                                </div>
                                            </div>
                                        </section>

                                        <section class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="card-title">
                                                        Status Peserta KB
                                                    </h2>
                                                    <p class="card-text">Lihat data KB pasien.
                                                    </p>
                                                    <a href="tabelKB.php" class="btn btn-primary custom-btn">
                                                        <i class="fas fa-edit"></i> Buka
                                                    </a>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="card-title">
                                                        Pemeriksaan Peserta KB
                                                    </h2>
                                                    <p class="card-text">Lihat data KB pasien.
                                                    </p>
                                                    <a href="tabelPKB.php" class="btn btn-primary custom-btn">
                                                        <i class="fas fa-edit"></i> Buka
                                                    </a>
                                                </div>
                                            </div>
                                        </section>

                                    <?php } ?>

                                    <div class="row">
                                        <div class="col-sm-4 mb-4">
                                            <a href="view-patient.php" class="btn btn-secondary custom-btn">
                                                <i class="fas fa-arrow-left"></i> Kembali
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Add Bootstrap JS and Popper.js scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Add Materialize JS script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>




<?php include_once('footer.php'); ?>