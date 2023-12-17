<?php
// session_start();
require_once('check_login.php');
include_once('head.php');
if ($_SESSION['user'] == 'doctor' || $_SESSION['user'] == 'admin') {
    include_once('pala.php');
}
include_once('connect.php');


switch ($_SESSION) {
    case 'doctor':
        if (isset($_GET['patientid'])) {
            $_SESSION['riwayat-patient_patientid'] = $_GET['patientid'];
        } else {
            if (!isset($_SESSION['riwayat-patient_patientid']) && $_SESSION['riwayat-patient_patientid'] == null) {
                header('view-patient.php');
                exit;
            }
        }
    default:
        # code...
        break;
}
if (isset($_GET['action'], $_POST['delete'])) {
    $status =
        mysqli_query(
            $conn,
            "DELETE from riwayatkehamilan where id = $_POST[delete]"
        );
    if ($status) {
        $_SESSION['popup-delete-sukses'] = true;
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Tabel Riwayat Kehamilan</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"> <i class="feather icon-home"></i> </a>
                                    </li>

                                    <li class="breadcrumb-item"><a href="tabelRK.php">Tabel Riwayat Kehamilan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="page-body">

                    <div class="card-header">
                        <div class="col-sm-10">
                            <h5>
                                <?php
                                $current_query_relative_to_user = $_SESSION['user'] == 'patient' ? $_SESSION['patientid'] : $_SESSION['riwayat-patient_patientid'];

                                echo $patient_name = mysqli_fetch_assoc(
                                    mysqli_query(
                                        $conn,
                                        "SELECT * FROM patient where patientid = '{$current_query_relative_to_user}'"
                                    )
                                )['patientname']; ?>
                            </h5>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Anak ke</th>
                                        <th>APIAH</th>
                                        <th>Umur Anak</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Cara Persalinan</th>
                                        <th>Penolong Persalinan</th>
                                        <th>Tempat Persalinan</th>
                                        <th>Keterangan</th>
                                        <?php
                                        if ($_SESSION['user'] == 'doctor') {
                                        ?>
                                            <th>Action</th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $rskehamilan = mysqli_query(
                                        $conn,
                                        "SELECT * FROM riwayatkehamilan where patient = '{$current_query_relative_to_user}'"
                                    );

                                    while ($array1 = mysqli_fetch_assoc($rskehamilan)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $array1['anak_ke'] ?></td>
                                            <td><?php echo $array1['APIAH'] ?></td>
                                            <td><?php echo $array1['umur_anak'] ?></td>
                                            <td><?php echo $array1['jk_anak'] ?></td>
                                            <td><?php echo $array1['cara_persalinan'] ?></td>
                                            <td><?php echo $array1['penolong_persalinan'] ?></td>
                                            <td><?php echo $array1['tempat_persalinan'] ?></td>
                                            <td><?php echo $array1['keterangan'] ?></td>
                                            <?php
                                            if ($_SESSION['user'] == 'doctor') {
                                            ?>
                                                <td>
                                                    <form action="?action=delete" method="post">
                                                        <button class="btn btn-md btn-danger" type="submit" name="delete" value="<?php echo $array1['id'] ?>" ">DELETE</button>
                                            </form>
                                            </td>
                                                <?php
                                            }
                                                ?>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <div class=" col-sm-4 mb-4">
                                                            <a href="<?php echo ($_SESSION['user'] == 'doctor' || $_SESSION['user'] == 'admin') ? 'view-patient.php' : 'index.php'; ?>" class="btn btn-secondary custom-btn">
                                                                <i class="fas fa-arrow-left"></i> Kembali
                                                            </a>

                        </div>



                    </div>


                </div>

                <div id="#">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include_once('footer.php'); ?>
<?php if (!empty($_SESSION['success'])) {  ?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Success
                </h1>
                <p><?php echo $_SESSION['success']; ?></p>
                <p>
                    <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
                    <!-- <button class="button button--success" data-for="js_success-popup">Close</button> -->
                </p>
        </div>
    </div>
<?php unset($_SESSION["success"]);
} ?>
<?php if (!empty($_SESSION['error'])) {  ?>
    <div class="popup popup--icon -error js_error-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Error
                </h1>
                <p><?php echo $_SESSION['error']; ?></p>
                <p>
                    <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
                    <!--  <button class="button button--error" data-for="js_error-popup">Close</button> -->
                </p>
        </div>
    </div>
<?php unset($_SESSION["error"]);
} ?>
<script>
    var addButtonTrigger = function addButtonTrigger(el) {
        el.addEventListener('click', function() {
            var popupEl = document.querySelector('.' + el.dataset.for);
            popupEl.classList.toggle('popup--visible');
        });
    };

    Array.from(document.querySelectorAll('button[data-for]')).
    forEach(addButtonTrigger);
</script>
<?php
if (isset($_SESSION['popup-delete-sukses']) && $_SESSION['popup-delete-sukses'] == true) {
?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Berhasil dihapus !",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    $_SESSION['popup-delete-sukses'] = false;
}
?>