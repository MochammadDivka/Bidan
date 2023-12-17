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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <?php $patient_solo = mysqli_fetch_assoc(
                                mysqli_query(
                                    $conn,
                                    "SELECT patientid FROM proses where id = '$_SESSION[proses_kunjungan_ulang]'"
                                )
                            )['patientid'];
                            ?>
                            <select class="form-control" name="patient" id="patient" required="">
                                <option value="<?php echo $patient_solo ?>" selected hidden>
                                    <?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT patientname FROM patient WHERE patientid = '$patient_solo'"))['patientname'] ?>
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- pembuka form 1 -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Tekanan_darah" class="col-sm-4 col-form-label">Tekanan darah</label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" id="Tekanan_darah" name="Tekanan_darah" />
                            </div>
                        </div>
                        <script>
                            function formatTekananDarah() {
                                var tekananDarahInput = document.getElementById('Tekanan_darah');
                                var tekananDarahValue = tekananDarahInput.value;

                            }
                        </script>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Haid_terakhir" class="col-sm-4 col-form-label">Haid terakhir</label>
                            <div class="col-sm-8">
                                <input required type="date" class="form-control" id="Haid_terakhir" name="Haid_terakhir" />
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Kebiasaan_merokok" class="col-sm-4 col-form-label">Kebiasaan merokok</label>
                            <div class="col-sm-8">
                                <select required class="form-control" id="Kebiasaan_merokok" name="Kebiasaan_merokok">
                                    <option value="merokok">Merokok</option>
                                    <option value="tidakMerokok">Tidak Merokok</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Tentang_menyusui" class="col-sm-4 col-form-label">Tentang
                                menyusui</label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" id="Tentang_menyusui" name="Tentang_menyusui" />
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Tanggal_persalinan_terakhir" class="col-sm-4 col-form-label"> Tanggal
                                persalinan terakhir</label>
                            <div class="col-sm-8">
                                <input required type="date" class="form-control" id="Tanggal_persalinan_terakhir" name="Tanggal_persalinan_terakhir" />
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
                                                <input required type="radio" name="sakit-kuning" value="ya"> Ya
                                                <input required type="radio" name="sakit-kuning" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Perd. Per. Vag.</div>
                                            <div style="flex-grow: 1;">
                                                <input required type="radio" name="vag" value="ya"> Ya
                                                <input required type="radio" name="vag" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tumor Payudara</div>
                                            <div style="flex-grow: 1;">
                                                <input required type="radio" name="tumor-payudara" value="ya"> Ya
                                                <input required type="radio" name="tumor-payudara" value="tidak"> Tidak
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
                                    <option value="Fluouralbus">Fluoralbus</option>
                                    <option value="-">-</option>
                                </select>
                                <select name="Keluhan" id="Keluhan" style="flex-grow: 1;">
                                    <option value="-">-</option>
                                    <option value="Gatal">Gatal</option>
                                    <option value="Seperti susu">seperti susu</option>
                                    <option value="Busa">Busa</option>
                                    <option value="Cair">Cair</option>
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
                                                <input required type="radio" name="tanda-radang" value="ya"> Ya
                                                <input required type="radio" name="tanda-radang" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tumor</div>
                                            <div style="flex-grow: 1;">
                                                <input required type="radio" name="tumor" value="ya"> Ya
                                                <input required type="radio" name="tumor" value="tidak"> Tidak
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Posisi Rahim</div>
                                            <div style="flex-grow: 1;">
                                                <input required type="radio" name="posisi-rahim" value="retro"> Retro
                                                <input required type="radio" name="posisi-rahim" value="antefleksi">
                                                Antefleksi
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Genetalia Luar/Dalam
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <input required type="radio" name="genetia-l/d" value="varices"> Varices
                                                <input required type="radio" name="genetia-l/d" value="jengger"> Jengger
                                                <input required type="radio" name="genetia-l/d" value="condilo"> Condilo
                                                <input required type="radio" name="genetia-l/d" value="bartholinitis">
                                                Bartholinitis
                                                <input required type="radio" name="genetia-l/d" value="normal">
                                                Normal
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
                                                <input required type="date" name="tanggal_dilayani">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tanggal dipesan kembali
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <input required type="date" name="tanggal_dipesan_kembali">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: flex;">
                                            <div style="max-width: 200px;min-width: 200px;">Tanggal dilepas</div>
                                            <div style="flex-grow: 1;">
                                                <input required type="date" name="tanggal_dilepas">
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
        $status = mysqli_query(
            $conn,
            "INSERT INTO `pemeriksaankb`(
      `patient`,
      `Tekanan_darah`,
      `Haid_terakhir`,
      `Kebiasaan_merokok`,
      `Tentang_menyusui`,
      `Tanggal_persalinan_terakhir`,
      `sakit-kuning`,
      `vag`,
      `tumor`,
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
            '{$_POST['sakit-kuning']}',
            '{$_POST['vag']}',
            '{$_POST['tumor-payudara']}',
            '{$_POST['Keluhan']}',
            '{$_POST['tanggal_dilayani']}',
            '{$_POST['tanggal_dipesan_kembali']}',
            '{$_POST['tanggal_dilepas']}')
            "
        );
        if ($status) {
            $_SESSION['popup-sukses'] = true;
        }
    }
}



if (isset($_SESSION['popup-sukses']) && $_SESSION['popup-sukses'] == true) {
?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Berhasil disimpan !",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    $_SESSION['popup-sukses'] = false;
}
?>