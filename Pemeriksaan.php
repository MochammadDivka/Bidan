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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    body {
        padding: 20px;
    }
    </style>
</head>
<?php
if (isset($_GET['setid_kunjungan_ulang'])) {
    $_SESSION['proses_kunjungan_ulang'] = $_GET['setid_kunjungan_ulang'];
    $proses_pasien = mysqli_fetch_array(mysqli_query($conn, "SELECT patientid from proses where id='$_SESSION[proses_kunjungan_ulang]'"))['patientid'];
    $nama_pasien = mysqli_fetch_array(mysqli_query($conn, "SELECT patientname from patient where patientid='$proses_pasien'"))['patientname'];
} else {
    if (isset($_SESSION['proses_kunjungan_ulang'])) {
        $proses_pasien = mysqli_fetch_array(mysqli_query($conn, "SELECT patientid from proses where id='$_SESSION[proses_kunjungan_ulang]'"))['patientid'];
        $nama_pasien = mysqli_fetch_array(mysqli_query($conn, "SELECT patientname from patient where patientid='$proses_pasien'"))['patientname'];
    } else {
        header("location: formproses.php");
    }
}
?>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Pemeriksaan
                </h3>
            </div>
            <div class="card-body">
                <form action="?pemeriksaan-submit" method="post">

                    <!-- ini adalah form  -->
                    <div class="form-group row">
                        <label for="patient" class="col-sm-4 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <div class="form-control" id="patient" name="patient"><?php echo $nama_pasien; ?></div>
                        </div>
                    </div>

                    <!-- pembuka form 1 -->
                    <div class="form-group row">
                        <label for="bentuk_tubuh" class="col-sm-4 col-form-label">Bentuk Tubuh</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="bentuk_tubuh" name="bentuk_tubuh">
                                <option value="-">-</option>
                                <option value="Normal">Normal</option>
                                <option value="Kelainan">Kelainan</option>
                                <option value="Abnormal">Abnormal</option>
                            </select>
                        </div>
                    </div>
                    <!-- penutup form 1 -->

                    <div class="form-group row">
                        <label for="kesadaran" class="col-sm-4 col-form-label">Kesadaran</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="kesadaran" name="kesadaran">
                                <option value="-">-</option>
                                <option value="Baik">Baik</option>
                                <option value="Ada gangguan">Ada gangguan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mata" class="col-sm-4 col-form-label">Mata</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Mata" name="Mata">
                                <option value="-">-</option>
                                <option value="Normal">Normal</option>
                                <option value="Kuning">Kuning</option>
                                <option value="Pucat">Pucat</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Leher" class="col-sm-4 col-form-label">Leher</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Leher" name="Leher">
                                <option value="-">-</option>
                                <option value="Besar">Besar</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Payudara" class="col-sm-4 col-form-label">Payudara</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Payudara" name="Payudara">
                                <option value="-">-</option>
                                <option value="Normal">Normal</option>
                                <option value="Ada benjolan">Ada benjolan</option>
                                <option value="Kemerahan">Kemerahan</option>
                                <option value="Putting masuk">Putting masuk</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Paru" class="col-sm-4 col-form-label">Paru</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Paru" name="Paru">
                                <option value="-">-</option>
                                <option value="Normal">Normal</option>
                                <option value="Bentuk dada">Bentuk dada</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Jantung" class="col-sm-4 col-form-label">Jantung</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Jantung" name="Jantung">
                                <option value="-">-</option>
                                <option value="Nafas normal">Nafas normal</option>
                                <option value="Sesak">Sesak</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Hati" class="col-sm-4 col-form-label">Hati</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Hati" name="Hati">
                                <option value="-">-</option>
                                <option value="Normal">Normal</option>
                                <option value="Pembesaran">Pembesaran</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Suhu Badan" class="col-sm-4 col-form-label">Suhu Badan</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Suhu Badan" name="Suhu Badan">
                                <option value="-">-</option>
                                <option value="Normal">Normal</option>
                                <option value="Demam">Demam</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Genetalia luar / dalam" class="col-sm-4 col-form-label">Genetalia luar /
                            dalam</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="Genetalia luar / dalam"
                                name="Genetalia luar / dalam">
                                <option value="-">-</option>
                                <option value="Varises">Varises</option>
                                <option value="Jengger">Jengger</option>
                                <option value="Condilo">Condilo</option>
                                <option value="Bartholinitis">Bartholinitis</option>
                            </select>
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
    if (isset($_GET['pemeriksaan-submit'])) {
        $patient_solo = mysqli_fetch_assoc(
            mysqli_query(
                $conn,
                "SELECT patientid FROM proses where id = $_SESSION[proses_kunjungan_ulang]"
            )
        )['patientid'];
        $status = mysqli_query(
            $conn,
            "INSERT INTO `pemeriksaan_fisik` (
        `patient`,
        `bentuk_tubuh`,
        `kesadaran`,
        `mata`,
        `leher`,
        `payudara`,
        `paru`,
        `jantung`,
        `hati`,
        `suhu_badan`,
        `genitalia_luar_dalam`
    ) VALUES (
        '{$patient_solo}',  
        '{$_POST['bentuk_tubuh']}',
        '{$_POST['kesadaran']}',
        '{$_POST['Mata']}',
        '{$_POST['Leher']}',
        '{$_POST['Payudara']}',
        '{$_POST['Paru']}',
        '{$_POST['Jantung']}',
        '{$_POST['Hati']}',
        '{$_POST['Suhu_Badan']}',
        '{$_POST['Genetalia_luar_/_dalam']}'
    )"
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