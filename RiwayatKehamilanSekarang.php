<?php
require_once('check_login.php');
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kehamilan Sekarang</title>

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
                <h3 class="mb-0">Riwayat Kehamilan Sekarang
                </h3>
            </div>
            <div class="card-body">
                <form action="?RiwayatKehamilanSekarang-submit" method="post">

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
                        <label for="G" class="col-sm-4 col-form-label">G</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="G" name="G" />
                        </div>
                    </div>
                    <!-- penutup form 1 -->

                    <div class="form-group row">
                        <label for="p" class="col-sm-4 col-form-label">P</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="p" name="p" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hpht" class="col-sm-4 col-form-label">HPHT</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="hpht" name="hpht" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hpl" class="col-sm-4 col-form-label">HPL</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="hpl" name="hpl" />
                        </div>
                    </div>

                    <!-- Lanjutno ng isor iki -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Muntah-Muntah</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muntah" id="biasa" value="Biasa" checked>
                                <label class="form-check-label" for="biasa">Biasa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muntah" id="menerus" value="Terus-menerus">
                                <label class="form-check-label" for="menerus">Terus-menerus</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pusing-pusing</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pusing" id="biasa" value="Biasa" checked>
                                <label class="form-check-label" for="biasa">Biasa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pusing" id="menerus" value="Terus-menerus">
                                <label class="form-check-label" for="menerus">Terus-menerus</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nyeri Perut</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nyeri" id="ada" value="Ada" checked>
                                <label class="form-check-label" for="ada">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nyeri" id="tidak" value="Tidak">
                                <label class="form-check-label" for="tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nafsu Makan</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nafsu" id="baik" value="Ada" checked>
                                <label class="form-check-label" for="baik">Baik</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nafsu" id="menurun" value="menurun">
                                <label class="form-check-label" for="menurun">Menurun</label>
                            </div>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Perdarahan</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="darah" id="ada" value="Ada" checked>
                                <label class="form-check-label" for="ada">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="darah" id="tidak" value="Tidak">
                                <label class="form-check-label" for="tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penyakitdiderita" class="col-sm-4 col-form-label">Penyakit yang diderita</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="penyakitdiderita" name="penyakitdiderita">
                                <option value="Paru">-</option>
                                <option value="Paru">Paru</option>
                                <option value="DM">DM</option>
                                <option value="Jantung">Jantung</option>
                                <option value="Epilepsi">Epilepsi</option>
                                <option value="Hati">Hati</option>
                                <option value="Psikosis">Psikosis</option>
                                <option value="Ginjal">Ginjal</option>
                                <option value="Malaria">Malaria</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keluarga" class="col-sm-4 col-form-label">Riwayat Penyakit Keluarga</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="keluarga" name="keluarga">
                                <option value="-">-</option>
                                <option value="Hipertensi">Hipertensi</option>
                                <option value="DM">DM</option>
                                <option value="Jantung">Jantung</option>
                                <option value="Epilepsi">Epilepsi</option>
                                <option value="Gemeli">Gemeli</option>
                                <option value="Psikosis">Psikosis</option>
                                <option value="Cacat Bawaan">Cacat Bawaan</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="kebiasaan" class="col-sm-4 col-form-label">Kebiasaan</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="kebiasaan" name="kebiasaan">
                                <option value="-">-</option>
                                <option value="Merokok">Merokok</option>
                                <option value="Minuman Keras">Minuman Keras</option>
                                <option value="Narkotik">Narkotik</option>
                                <option value="Obat Penenang">Obat Penenang</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keluhan" class="col-sm-4 col-form-label">Keluhan</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="keluhan" name="keluhan">
                                <option value="-">-</option>
                                <option value="Flour Albus">Flour Albous (Gatal,Berbau,Seperti Susu, Busa Cair)</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pasangan Sexual Istri</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pasanganistri" id="satu" value="Satu" checked>
                                <label class="form-check-label" for="ada">Satu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pasanganistri" id="lebih" value="Lebih dari satu">
                                <label class="form-check-label" for="tidak">Lebih dari satu</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pasangan Sexual Suami</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pasangansuami" id="satu" value="Satu" checked>
                                <label class="form-check-label" for="ada">Satu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pasangansuami" id="lebih" value="Lebih dari satu">
                                <label class="form-check-label" for="tidak">Lebih dari satu</label>
                            </div>
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
if (isset($_POST) && count($_POST) > 0) {
    if (isset($_GET['RiwayatKehamilanSekarang-submit'])) {
        mysqli_query(
            $conn,
            "INSERT INTO `kehamilansekarang` (
        `patient`,
        `G`,
        `P`,
        `HPHT`,
        `HPL`,
        `muntah`,
        `pusing`,
        `nyeriperut`,
        `nafsu_makan`,
        `penyakit`,
        `riwayatpenyakit_keluarga`,
        `kebiasaan`,
        `keluhan`,
        `pasangansex_istri`,
        `pasangansex_suami`
         
       
    ) VALUES (
        '{$_POST['patient']}',
        '{$_POST['G']}',
        '{$_POST['p']}',
        '{$_POST['hpht']}',
        '{$_POST['hpl']}',
        '{$_POST['muntah']}',
        '{$_POST['pusing']}',
        '{$_POST['nyeri']}',
        '{$_POST['nafsu']}',
        '{$_POST['darah']}',
        '{$_POST['penyakitdiderita']}',
        '{$_POST['keluarga']}',
        '{$_POST['kebiasaan']}',
        '{$_POST['keluhan']}',
        '{$_POST['pasanganistri']}',
        '{$_POST['pasangansuami']}'
        
    )"
        );
    }
}

?>