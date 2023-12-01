<?php
require_once('check_login.php');
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kehamilan</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Riwayat Kehamilan
                </h3>
            </div>
            <div class="card-body">
                <form action="?RiwayatKehamilan-submit" method="post">

                    <!-- ini adalah form  -->
                    <div class="form-group row">
                        <label for="bentuk_tubuh" class="col-sm-4 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="patient" id="patient" required="">
                                <option>-- Pilih Pasien--</option>
                                <?php
                                $sqlpatient = "SELECT * FROM proses WHERE status = 'belum selesai'";

                                $qsqlpatient = mysqli_query($conn, $sqlpatient);
                                while ($rspatient = mysqli_fetch_array($qsqlpatient)) {
                                    $adawd = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM patient WHERE patientid = '$rspatient[patientid]'"));

                                    if ($rspatient['patientid'] == $rsedit['patientid']) {
                                        echo "<option value='" . $rspatient['patientid'] . "' selected>" . $rspatient['patientid'] . " - " . $adawd['patientname'] . "</option>";
                                    } else {
                                        echo "<option value='" . $rspatient['patientid'] . "'>" . $rspatient['patientid'] . " - " . $adawd['patientname'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- pembuka form 1 -->
                    <div class="form-group row">
                        <label for="anak_ke" class="col-sm-4 col-form-label">Anak ke</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="anak_ke" name="anak_ke" />
                        </div>
                    </div>
                    <!-- penutup form 1 -->

                    <div class="form-group row">
                        <label for="apiah" class="col-sm-4 col-form-label">APIAH</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="apiah" name="apiah" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="umuranak" class="col-sm-4 col-form-label">Umur Anak</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="umuranak" name="umuranak" />
                        </div>
                    </div>

                    <!-- Lanjutno ng isor iki -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Jkanak" id="perempuan" value="Perempuan" checked>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Jkanak" id="laki-laki" value="Laki-Laki">
                                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="bbl" class="col-sm-4 col-form-label">BBL</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="bbl" name="bbl" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cara_persalinan" class="col-sm-4 col-form-label">Cara Persalinan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="cara_persalinan" name="cara_persalinan" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penolong" class="col-sm-4 col-form-label">Penolong Persalinan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="penolong" name="penolong" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_p" class="col-sm-4 col-form-label">Tempat Persalinan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tempat_p" name="tempat_p" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ket" name="ket" />
                        </div>
                    </div>




                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-success">Submit</button>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <a href="proses.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Add Bootstrap JS and Popper.js scripts here -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>


<!-- request handler -->
<?php

if (isset($_GET) || isset($_POST)) {
    if (isset($_GET['RiwayatKehamilan-submit'])) {

        mysqli_query(
            $conn,
            "INSERT INTO `riwayatkehamilan` (
        `patient`,
        `anak_ke`,
        `APIAH`,
        `umur_anak`,
        `jk_anak`,
        `cara_persalinan`,
        `penolong_persalinan`,
        `tempat_persalinan`,
        `keterangan`
       
    ) VALUES (
        '{$_POST['patient']}',
        '{$_POST['anak_ke']}',
        '{$_POST['apiah']}',
        '{$_POST['umuranak']}',
        '{$_POST['Jkanak']}',
        '{$_POST['cara_persalinan']}',
        '{$_POST['penolong']}',
        '{$_POST['tempat_p']}',
        '{$_POST['ket']}'
        
    )"
        );
    }
}

?>