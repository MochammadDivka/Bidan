<?php require_once('check_login.php'); ?>
<?php include_once('head.php'); ?>

<?php if ($_SESSION['user'] == 'doctor ' || $_SESSION['user'] == 'admin') {
    include_once('header.php');
    include_once('sidebar.php');
} ?>

<?php include_once('connect.php'); ?>
<?php

if (isset($_POST['btn_submit'])) {
    if (isset($_GET['editid'])) {
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        // $department = mysqli_real_escape_string($conn, $_POST['department']);
        $appointmentdate = mysqli_real_escape_string($conn, $_POST['appointmentdate']);
        $appointmenttime = mysqli_real_escape_string($conn, $_POST['appointmenttime']);
        $doctor = mysqli_real_escape_string($conn, $_POST['doctor']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $sql = "UPDATE appointment SET patientid='$patient', departmentid='$department', appointmentdate='$appointmentdate', appointmenttime='$appointmenttime', doctorid='$doctor', status='$status' WHERE appointmentid='" . $_GET['editid'] . "'";

        if ($qsql = mysqli_query($conn, $sql)) {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Appointment Record Updated Successfully</p>
                    <p>
                        <?php echo "<script>setTimeout(\"location.href = 'appointment.php';\",1500);</script>"; ?>
                    </p>
                </div>
            </div>
        <?php
        } else {
            echo mysqli_error($conn);
        }
    } else {
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $appointmentdate = mysqli_real_escape_string($conn, $_POST['appointmentdate']);
        $appointmenttime = mysqli_real_escape_string($conn, $_POST['appointmenttime']);
        $doctor = mysqli_real_escape_string($conn, $_POST['doctor']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);

        $sql = "UPDATE patient SET status='Active' WHERE patientid='$patient'";
        $qsql = mysqli_query($conn, $sql);

        $sql = "INSERT INTO appointment(patientid, departmentid, appointmentdate, appointmenttime, doctorid, status, app_reason) VALUES('$patient', '$department', '$appointmentdate', '$appointmenttime', '$doctor', '$status', '$reason')";

        if ($qsql = mysqli_query($conn, $sql)) {
        ?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Appointment Record Inserted Successfully</p>
                    <p>
                        <?php echo "<script>setTimeout(\"location.href = 'appointment.php?patientid=$patient';\",1500);</script>"; ?>
                    </p>
                </div>
            </div>
<?php
        } else {
            echo mysqli_error($conn);
        }
    }
}

if (isset($_GET['editid'])) {
    $editid = mysqli_real_escape_string($conn, $_GET['editid']);
    $sql = "SELECT * FROM appointment WHERE appointmentid='$editid'";
    $qsql = mysqli_query($conn, $sql);
    $rsedit = mysqli_fetch_array($qsql);
}
?>

<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Pendaftaran Pemeriksaan</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Pendaftaran Pemeriksaan</a></li>
                                    <li class="breadcrumb-item"><a href="appointment.php">Pendaftaran Pemeriksaan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-block">
                                    <form id="main" method="post" action="" enctype="multipart/form-data">
                                        <?php
                                        if (isset($_GET['patid'])) {
                                            $sqlpatient = "SELECT * FROM patient WHERE patientid='" . $_GET['patid'] . "'";
                                            $qsqlpatient = mysqli_query($conn, $sqlpatient);
                                            $rspatient = mysqli_fetch_array($qsqlpatient);
                                            echo $rspatient['patientname'] . " (Patient ID - " . $rspatient['patientid'] . ")";
                                            echo "<input type='hidden' name='select4' value='" . $rspatient['patientid'] . "'>";
                                        }
                                        ?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pasien</label>
                                            <div class="col">
                                                <select class="form-control" readonly name="patient" id="patient" required="">
                                                    <option hidden value="<?php echo $_SESSION['patientid'] ?>">
                                                        <?php echo $_SESSION['fname'] ?></option>
                                                </select>
                                                <span class="messages"></span>
                                            </div>


                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="appointmentdate" id="appointmentdate" placeholder="Enter firstname...." required="">
                                                <span class="messages"></span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Waktu</label>
                                            <div class="col-sm-4">
                                                <input type="time" class="form-control" name="appointmenttime" id="appointmenttime" placeholder="Enter lastname...." required="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bidan</label>
                                            <div class="col-sm-4">
                                                <select name="doctor" name="doctor" class="form-control">
                                                    <option value="">Pilih Bidan</option>
                                                    <?php
                                                    $sqldoctor = "SELECT * FROM doctor INNER JOIN department ON department.departmentid=doctor.departmentid WHERE doctor.status='Active'";
                                                    $qsqldoctor = mysqli_query($conn, $sqldoctor);
                                                    while ($rsdoctor = mysqli_fetch_array($qsqldoctor)) {
                                                        if (isset($_GET['patid'])) {
                                                            if ($rsdoctor['doctorid'] == $rsedit['doctorid']) {
                                                                echo "<option value='" . $rsdoctor['doctorid'] . "' selected>" . $rsdoctor['doctorname'] . " ( " . $rsdoctor['departmentname'] . " ) </option>";
                                                            } else {
                                                                echo "<option value='" . $rsdoctor['doctorid'] . "'>" . $rsdoctor['doctorname'] . " ( " . $rsdoctor['departmentname'] . " )</option>";
                                                            }
                                                        } else {
                                                            echo "<option value='" . $rsdoctor['doctorid'] . "'>" . $rsdoctor['doctorname'] . " ( " . $rsdoctor['departmentname'] . " )</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-4">
                                                <select name="status" id="status" class="form-control" required="">

                                                    <option hidden value="Inactive" <?php if (isset($_GET['patid'])) {
                                                                                        if ($rsedit['status'] == 'Inactive') {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    } ?>>Periksa</option>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="reason" id="reason" placeholder="Isikan Keterangan pemeriksaan anda...." required=""><?php if (isset($_GET['patid'])) {
                                                                                                                                                                                echo $rsedit['app_reason'];
                                                                                                                                                                            } ?></textarea>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>
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

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>