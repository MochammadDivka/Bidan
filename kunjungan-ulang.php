<?php
require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body style="background-color: #f0f0f0;">
    <style>
    table,
    thead,
    tbody,
    tr,
    td {
        border: 1px solid black;
    }

    thead {
        font-weight: bold;
    }

    td {
        text-transform: capitalize;
        padding: 0px 5px;
    }
    </style>

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

        $efek_samping = $_POST['efek_samping'];

        $komplikasi = $_POST['komplikasi'];

        $tindakan = $_POST['tindakan'];

        $Tanggal_kembali = $_POST['Tanggal_kembali'];

        $date_now = date('d-m-Y');
        mysqli_query($conn, "
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
    }
    ?>



    <form class="container" action="" method="post" style="width: 50%; margin: 50px auto;">
        <h1 class="h3 mb-3">Kunjungan Ulang</h1>
        <div class="mb-3">
            <label for="tanggal_haid" class="form-label">Tanggal Haid</label>
            <input required type="date" class="form-control" id="tanggal_haid" name="tanggal_haid"
                placeholder="Masukkan nama pasien">
        </div>
        <div class="mb-3">
            <label for="tekanan_darah" class="form-label">Tekanan Darah</label>
            <input required type="text" class="form-control" id="tekanan_darah" name="tekanan_darah"
                placeholder="Masukkan tekanan darah">
        </div>
        <div class="mb-3">
            <label for="bb" class="form-label">Berat Badan</label>
            <input required type="text" class="form-control" id="bb" name="bb" placeholder="Masukkan berat badan">
        </div>
        <div class="mb-3">
            <label for="efek_samping" class="form-label">Efek Samping</label>
            <input required type="text" class="form-control" id="efek_samping" name="efek_samping"
                placeholder="Masukkan efek samping">
        </div>
        <div class="mb-3">
            <label for="komplikasi" class="form-label">Komplikasi</label>
            <input required type="text" class="form-control" id="komplikasi" name="komplikasi"
                placeholder="Masukkan komplikasi">
        </div>
        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan</label>
            <input required type="text" class="form-control" id="tindakan" name="tindakan"
                placeholder="Masukkan tindakan">
        </div>
        <div class="mb-3">
            <label for="Tanggal kembali" class="form-label">Tanggal kembali</label>
            <input required type="date" class="form-control" id="Tanggal kembali" name="Tanggal kembali"
                placeholder="Masukkan Tanggal kembali">
        </div>
        <div style="display:flex; gap: 10px;">
            <div class="form-group row">
                <div class="col-sm-4">
                    <a href="proses.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <button type="submit" name="kunjungan-ulang" value="submit" class="btn btn-primary">Kirim</button>

        </div>
    </form>



</body>

</html>