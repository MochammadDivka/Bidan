<?php require_once('check_login.php'); ?>
<?php include_once('head.php'); ?>
<?php if ($_SESSION['user'] == 'doctor ' || $_SESSION['user'] == 'admin') {
    include_once('header.php');
    include_once('sidebar.php');
} ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include_once('connect.php');
if (isset($_GET['delid'])) {
    $sql = "UPDATE appointment SET delete_status='1' WHERE appointmentid='$_GET[delid]'";
    $qsql = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['popup-delete'] = true;
        //echo "<script>alert('appointment record deleted successfully..');</script>";
        //echo "<script>window.location='view-pending-appointment.php';</script>";
    }
}

if (isset($_SESSION['popup-delete']) && $_SESSION['popup-delete'] == true) {
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
}
if (isset($_GET['approveid'])) {
    $sql = "UPDATE patient SET status='Active' WHERE patientid='$_GET[patientid]'";
    $qsql = mysqli_query($conn, $sql);

    $sql = "UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
    $qsql = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) == 1)
        mysqli_query($conn, "INSERT INTO `proses`(`id_proses`, `patientid`, `status`) VALUES ('$_GET[approveid]','$_GET[patientid]', 'belum selesai')"); {
        $_SESSION['popup-approved'] = true;
        //echo "<script>alert('Appointment record Approved successfully..');</script>";
        //echo "<script>window.location='view-pending-appointment.php';</script>";
    }
}

if (isset($_SESSION['popup-approved']) && $_SESSION['popup-approved'] == true) {
?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Appointment record Approved successfully.",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php

}
?>

<?php
if (isset($_GET['id'])) { ?>
    <div class="popup popup--icon -question js_question-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Sure
                </h1>
                <p>Are You Sure To Delete This Record?</p>
                <p>
                    <a href="view-pending-appointment.php?delid=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
                    <a href="view-pending-appointment.php" class="button button--error" data-for="js_success-popup">No</a>
                </p>
        </div>
    </div>
<?php } ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Persetujuan Pemeriksaan</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Persetujuan Pemeriksaan</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="view-pending-appointment.php">Persetujuan
                                            Pemeriksaan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-body">

                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Pasien</th>
                                            <th>Waktu Pendaftaran</th>
                                            <th>Bidan</th>
                                            <th>Alasan Pemeriksaan</th>
                                            <th>Status</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM appointment WHERE (status='Pending' OR status='Inactive') and delete_status = '0'";
                                        if (isset($_SESSION['patientid'])) {
                                            $sql  = $sql . " AND patientid='$_SESSION[patientid]'";
                                        }
                                        $qsql = mysqli_query($conn, $sql);
                                        while ($rs = mysqli_fetch_array($qsql)) {
                                            $sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
                                            $qsqlpat = mysqli_query($conn, $sqlpat);
                                            $rspat = mysqli_fetch_array($qsqlpat);


                                            //   $sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
                                            //   $qsqldept = mysqli_query($conn,$sqldept);
                                            //   $rsdept = mysqli_fetch_array($qsqldept);

                                            $sqldoc = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
                                            $qsqldoc = mysqli_query($conn, $sqldoc);
                                            $rsdoc = mysqli_fetch_array($qsqldoc);
                                            echo "<tr>

          <td>&nbsp;$rspat[patientname]</td>     
            <td>&nbsp;" . date("d-M-Y", strtotime($rs['appointmentdate'])) . " &nbsp; " . date("H:i A", strtotime($rs['appointmenttime'])) . "</td> 
          
          <td>&nbsp;$rsdoc[doctorname]</td>
          <td>&nbsp;$rs[app_reason]</td>
          <td>&nbsp;$rs[status]</td>
          <td>";
                                            if ($rs['status'] != "Approved") {
                                                if (!(isset($_SESSION['patientid']))) {
                                                    echo "<a href='view-pending-appointment.php?approveid=$rs[appointmentid]&patientid=$rs[patientid]' class='btn btn-xs btn-primary'>Approve</a>";
                                                }
                                                echo "  <a href='view-pending-appointment.php?id=$rs[appointmentid]' class='btn btn-xs btn-danger'>Delete</a>";
                                            } else {
                                                echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' class='btn btn-xs btn-primary'>View Report</a>";
                                            }
                                            echo "</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php if ($_SESSION['user'] == 'patient') {
                                ?>

                                    <div class="form-group row">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-10">
                                            <!-- Tombol Kembali -->
                                            <a href="index.php" class="btn btn-secondary m-b-0">
                                                <i class="feather icon-arrow-left"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
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
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Berhasil disimpan !",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
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