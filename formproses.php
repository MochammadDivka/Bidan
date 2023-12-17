<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');
if (isset($_GET['id'])) {
    $sql = "UPDATE doctor_timings SET delete_status='1' WHERE doctor_timings_id='$_GET[id]'";
    $qsql = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) == 1) {
?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <div class="popup popup--icon -success js_success-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    Success
                </h3>
                <p>Visiting Hour record deleted successfully.</p>
                <p>
                    <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                    <?php echo "<script>setTimeout(\"location.href = 'view-visiting-hour.php';\",1500);</script>"; ?>
                </p>
            </div>
        </div>
<?php

    }
}
?>
<?php
if (isset($_GET['delid'])) { ?>
    <div class="popup popup--icon -question js_question-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Sure
                </h1>
                <p>Are You Sure To Delete This Record?</p>
                <p>
                    <a href="view-visiting-hour.php?id=<?php echo $_GET['delid']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
                    <a href="view-visiting-hour.php" class="button button--error" data-for="js_success-popup">No</a>
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
                                    <h4>Proses</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="formproses.php">Proses</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-body">

                    <div class="card">
                        <div class="card-header">
                            <div class="col-sm-10">
                            </div>

                        </div>
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Pasien</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqlpatient = "SELECT * FROM proses where status = 'belum selesai'";
                                        $qsqlpatient = mysqli_query($conn, $sqlpatient);
                                        while ($rspatient = mysqli_fetch_array($qsqlpatient)) {
                                            $adawd = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM patient WHERE patientid = '$rspatient[patientid]'"));
                                        ?>
                                            <tr>
                                                <td><?php echo $adawd['patientname'] ?></td>
                                                <td> <a href='?set-selesai= <?php echo $rspatient['id'] ?>' class='btn btn-xs btn-danger'>Simpan</a></td>
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
                                                <td> <a href='proses.php?prosesid=<?php echo $rspatient['id'] ?>' class='btn btn-xs btn-primary'>Periksa <i class="fas fa-arrow-right"></i></a></td>
                                            </tr>
                                        <?php
                                            if (isset($_GET['set-selesai'])) {
                                                mysqli_query($conn, "UPDATE `proses` SET `status`='selesai' WHERE id = '{$_GET['set-selesai']}'");
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
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
<?php include('footer.php'); ?>
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