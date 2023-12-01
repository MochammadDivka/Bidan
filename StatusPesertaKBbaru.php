<?php
require_once('check_login.php');
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Status Peserta KB Baru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <h3 class="mb-0">
                    Status Peserta KB Baru
                    <!-- iki gae judul e -->
                </h3>
            </div>
            <div class="card-body">
                <form action="?submit-StatusPesertaKBbaru" method="post">
                    <!-- ini adalah form  -->
                    <div class="form-group row">
                        <label for="bentuk_tubuh" class="col-sm-4 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <select required class="form-control" name="patient" id="patient" required="">
                                <option>-- Select One--</option>
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
                    <div class="form-group row">
                        <label for="Jumlah anak hidup" class="col-sm-4 col-form-label">1. Jumlah anak hidup</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="Jumlah anak hidup"
                                name="Jumlah anak hidup" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Keinginan punya anak lagi" class="col-sm-4 col-form-label">2. Keinginan punya anak
                            lagi</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="Keinginan punya anak lagi"
                                name="Keinginan punya anak lagi" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Saat ingin punya anak lagi" class="col-sm-4 col-form-label">3. Saat ingin punya anak
                            lagi</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="Saat ingin punya anak lagi"
                                name="Saat ingin punya anak lagi" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Status kehamilan saat ini" class="col-sm-4 col-form-label">4. Status kehamilan saat
                            ini</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="Status kehamilan saat ini"
                                name="Status kehamilan saat ini" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Riwayat komplikasi kehamilan" class="col-sm-4 col-form-label">5. Riwayat komplikasi
                            kehamilan</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="Riwayat komplikasi kehamilan"
                                name="Riwayat komplikasi kehamilan" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Sikap pasangan terhadap KB" class="col-sm-4 col-form-label">6. Sikap pasangan
                            terhadap KB</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="Sikap pasangan terhadap KB"
                                name="Sikap pasangan terhadap KB" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Menjelaskan resiko" class="col-sm-4 col-form-label">7. Menjelaskan resiko</label>
                        <div class="col-sm-8" style="display: flex; gap: 10px;">
                            <select name="Menjelaskan resiko" id="Menjelaskan resiko" style="flex-grow: 1;">
                                <option value="">-</option>
                                <option value="">HIV</option>
                                <option value="">AIDS</option>
                                <option value="">PMS</option>
                            </select>
                            <input required type="text" class="form-control" id="Menjelaskan resiko"
                                name="Menjelaskan resiko" style="max-width: 500px;" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Metoode ganda untuk akseptor KB yang resiko" class="col-sm-4 col-form-label">8.
                            Metoode ganda untuk akseptor KB yang resiko</label>
                        <div class="col-sm-8" style="display: flex; gap: 10px; max-height: 38px;">
                            <select name="Metoode ganda untuk akseptor KB yang resiko option"
                                id="Metoode ganda untuk akseptor KB yang resiko option" style="flex-grow: 1;">
                                <option value="">-</option>
                                <option value="">Tertular HIV</option>
                                <option value="">AIDS</option>
                                <option value="">PMS (pakai kondom)</option>
                            </select>
                            <input required type="text" class="form-control"
                                id="Metoode ganda untuk akseptor KB yang resiko"
                                name="Metoode ganda untuk akseptor KB yang resiko" style="max-width: 500px;" />
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
    if (isset($_GET['submit-StatusPesertaKBbaru'])) {
        $status = mysqli_query(
            $conn,
            "INSERT INTO `perencanaan_kehamilan`(
        `patient`,
        `jumlah_anak_hidup`,
        `keinginan_punya_anak_lagi`,
        `saat_ingin_punya_anak_lagi`,
        `status_kehamilan_saat_ini`,
        `riwayat_komplikasi_kehamilan`,
        `sikap_pasangan_terhadap_KB`,
        `menjelaskan_resiko`,
        `metode_ganda_untuk_akseptor_KB_yang_resiko_option`,
        `metode_ganda_untuk_akseptor_KB_yang_resiko`)
    VALUES(
        '{$_POST['patient']}',
        '{$_POST['Jumlah_anak_hidup']}',
        '{$_POST['Keinginan_punya_anak_lagi']}',
        '{$_POST['Saat_ingin_punya_anak_lagi']}',
        '{$_POST['Status_kehamilan_saat_ini']}',
        '{$_POST['Riwayat_komplikasi_kehamilan']}',
        '{$_POST['Sikap_pasangan_terhadap_KB']}',
        '{$_POST['Menjelaskan_resiko']}',
        '{$_POST['Metoode_ganda_untuk_akseptor_KB_yang_resiko_option']}',
        '{$_POST['Metoode_ganda_untuk_akseptor_KB_yang_resiko']}')"
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
    title: "kontol",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php
    $_SESSION['popup-sukses'] = false;
}
?>