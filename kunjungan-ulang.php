<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunjungan Ulang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<?php
session_start();

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
<?php
if (isset($_POST['kunjungan-ulang']) && $_POST['kunjungan-ulang'] == 'submit') {
    $tanggal_haid = $_POST['tanggal_haid'];

    $tekanan_darah = $_POST['tekanan_darah'];

    $bb = $_POST['bb'];

    $efek_samping = $_POST['efek_samping'] ?? null;

    $komplikasi = $_POST['komplikasi'];

    $tindakan = $_POST['tindakan'];

    $Tanggal_kembali = $_POST['Tanggal_kembali'];

    $date_now = date('d-m-Y');


    $status = mysqli_query($conn, "
INSERT INTO `kunjungan_ulang`(
    `id_pasien`,
 `tanggal`,
 `haid_tanggal`,
 `b.b`,
 `tek.darah`,
 `keluhan_efek_samping`,
 `keluhan_komplikasi`,
 `tindakan`,
 `tanggal_kembali`) VALUES (
    '{$proses_pasien}',
    '{$date_now}',
    '{$tanggal_haid}',
    '{$bb}',
    '{$tekanan_darah}',
    '{$efek_samping}',
    '{$komplikasi}',
    '{$tindakan}',
    '{$Tanggal_kembali}')
");
    if ($status) {
        $_SESSION['popup-sukses'] = true;
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

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    Kunjungan Ulang
                    <!-- iki gae judul e -->
                </h3>
            </div>
            <div class="card-body">
                <form action="?submit-kunjungan_ulang" method="post">
                    <!-- ini adalah form  -->
                    <div class="form-group row">
                        <label for="nama pasien" class="col-sm-4 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="nama pasien" name="nama pasien" value="<?php echo $nama_pasien; ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_haid" class="col-sm-4 col-form-label">Tanggal Haid</label>
                        <div class="col-sm-8">
                            <input required type="date" class="form-control" id="tanggal_haid" name="tanggal_haid" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tekanan_darah" class="col-sm-4 col-form-label">Tekanan Darah</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" />
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="bb" class="col-sm-4 col-form-label">Berat Badan</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="bb" name="bb" />
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="komplikasi" class="col-sm-4 col-form-label">Efek Samping</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="komplikasi" name="efek_samping" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="komplikasi" class="col-sm-4 col-form-label">Komplikasi</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="komplikasi" name="komplikasi" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tindakan" class="col-sm-4 col-form-label">Tindakan</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="tindakan" name="tindakan" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Tanggal kembali" class="col-sm-4 col-form-label">Tanggal kembali</label>
                        <div class="col-sm-8">
                            <input required type="date" class="form-control" id="Sikap pasangan terhadap KB" name="Tanggal_kembali" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" name="kunjungan-ulang" value="submit" class="btn btn-success">Submit</button>
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
<script>
    $(document).ready(function() {
        var beratBadanInput = $('#bb');


        beratBadanInput.on('input', function() {

            var nilaiInput = $(this).val();

            nilaiInput = nilaiInput.replace(/\D/g, '');


            $(this).val(nilaiInput + ' KG');
        });
    });
    $(document).ready(function() {

        var tekananDarahInput = $('#tekanan_darah');


        tekananDarahInput.on('input', function() {

            var nilaiInput = $(this).val();


            nilaiInput = nilaiInput.replace(/\D/g, '');


            $(this).val(nilaiInput + ' mmHg');
        });
    });
</script>

</html>