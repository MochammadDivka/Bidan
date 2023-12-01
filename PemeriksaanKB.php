<?php
require_once('check_login.php');
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Form</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Pemeriksaan
                </h3>
            </div>
            <div class="card-body">
                <form action="?PemeriksaanKB" method="post">

                    <!-- ini adalah form  -->
                    <div class="form-group row">
                        <label for="bentuk_tubuh" class="col-sm-4 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="patient" id="patient" required="">
                                <option>-- Select One--</option>
                                <?php
                                $sqlpatient = "SELECT * FROM proses";
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
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Tekanan darah" class="col-sm-4 col-form-label">Tekanan darah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Tekanan darah" name="Tekanan darah" />
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Haid terakhir" class="col-sm-4 col-form-label">Haid terakhir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="Haid terakhir" name="Haid terakhir" />
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Kebiasaan merokok" class="col-sm-4 col-form-label">Kebiasaan
                                merokok</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Kebiasaan merokok" name="Kebiasaan merokok" />
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Tentang menyusui" class="col-sm-4 col-form-label">Tentang
                                menyusui</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Tentang menyusui" name="Tentang menyusui" />
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Tanggal persalinan terakhir" class="col-sm-4 col-form-label"> Tanggal
                                persalinan terakhir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="Tanggal persalinan terakhir" name="Tanggal persalinan terakhir" />
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Keadaan calon Peserta saat ini" class="col-sm-4 col-form-label">Keadaan
                                calon Peserta saat ini</label>
                            <div class="col-sm-8">

                                <ul style="list-style: square">
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Sakit Kuning</div>
                                            <div style="flex-grow: 1;">
                                                <input type="radio" name="sakit-kuning" value="ya"> Ya
                                                <input type="radio" name="sakit-kuning" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Perd. Per. Vag.</div>
                                            <div style="flex-grow: 1;">
                                                <input type="radio" name="perd.per.vag" value="ya"> Ya
                                                <input type="radio" name="perd.per.vag" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tumor Payudara</div>
                                            <div style="flex-grow: 1;">
                                                <input type="radio" name="tumor-nenen" value="ya"> Ya
                                                <input type="radio" name="tumor-nenen" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Keluhan" class="col-sm-4 col-form-label">Keluhan</label>
                            <div class="col-sm-8" style="display: flex; gap: 10px; max-height: 38px;">
                                <select name="Keluhan" id="Keluhan" style="flex-grow: 1;">
                                    <option value="">Fluoralbus</option>
                                </select>
                                <select name="Keluhan" id="Keluhan" style="flex-grow: 1;">
                                    <option value="">-</option>
                                    <option value="">Gatal</option>
                                    <option value="">seperti susu</option>
                                    <option value="">Busa</option>
                                    <option value="">Cair</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Calon Aks.IUD dilakukan pemeriksaan" class="col-sm-4 col-form-label">
                                Calon Aks.IUD dilakukan pemeriksaan</label>
                            <div class="col-sm-8">

                                <ul style="list-style: square">
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tanda Radang</div>
                                            <div style="flex-grow: 1;">
                                                <input type="radio" name="tanda-radang" value="ya"> Ya
                                                <input type="radio" name="tanda-radang" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tumor</div>
                                            <div style="flex-grow: 1;">
                                                <input type="radio" name="tumor" value="ya"> Ya
                                                <input type="radio" name="tumor" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Posisi Rahim</div>
                                            <div style="flex-grow: 1;">
                                                <input type="radio" name="posisi-rahim" value="retro"> Retro
                                                <input type="radio" name="posisi-rahim" value="antefleksi">
                                                Antefleksi
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Genetalia Luar/Dalam
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <input type="radio" name="genetia-l/d" value="varices"> Varices
                                                <input type="radio" name="genetia-l/d" value="jengger"> Jengger
                                                <input type="radio" name="genetia-l/d" value="condilo"> Condilo
                                                <input type="radio" name="genetia-l/d" value="bartholinitis">
                                                Bartholinitis
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Alat Kontrasepsi yang diberikan" class="col-sm-4 col-form-label">Alat
                                Kontrasepsi yang diberikan</label>
                            <div class="col-sm-8">
                                <ul style="list-style: square">
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tanggal dilayani</div>
                                            <div style="flex-grow: 1;">
                                                <input type="date" name="tanggal_dilayani">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tanggal dipesan kembali
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <input type="date" name="tanggal_dipesan_kembali">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tanggal dilepas</div>
                                            <div style="flex-grow: 1;">
                                                <input type="date" name="tanggal_dilepas">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>



                            <div class="form-group row" style="display: flex; gap: 10px;">
                                <a href="proses.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success">Submit</button>

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

<?php

if (isset($_GET) || isset($_POST)) {
    if (isset($_GET['PemeriksaanKB'])) {
        mysqli_query(
            $conn,
            "INSERT INTO `pemeriksaankb`(
      `patient`,
      `Tekanan_darah`,
      `Haid_terakhir`,
      `Kebiasaan_merokok`,
      `Tentang_menyusui`,
      `Tanggal_persalinan_terakhir`,
      `Keluhan`,
      `tanggal_dilayani`,
      `tanggal_dipesan_kembali`,
      `tanggal_dilepas`) 
      VALUES (
        '{$_POST['patient']}',
        '{$_POST['Tekanan_darah']}',
        '{$_POST['Haid_terakhir']}',
        '{$_POST['Kebiasaan_merokok']}',
        '{$_POST['Tentang_menyusui']}',
        '{$_POST['Tanggal_persalinan_terakhir']}',
        '{$_POST['Keluhan']}',
        '{$_POST['tanggal_dilayani']}',
        '{$_POST['tanggal_dipesan_kembali']}',
        '{$_POST['tanggal_dilepas']}')
        "
        );
    }
}

?>