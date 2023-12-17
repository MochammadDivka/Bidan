<?php require_once('check_login.php'); ?>
<?php include_once('head.php'); ?>
<?php if ($_SESSION['user'] == 'doctor ' || $_SESSION['user'] == 'admin') {
    include_once('header.php');
    include_once('sidebar.php');
} ?>

<?php
include_once('connect.php');
if (isset($_POST["btn_update"])) {
    extract($_POST);

    if ($_SESSION['user'] == 'admin') {
        $q1 = "UPDATE admin SET `fname`='$fname',`loginid`='$email',`mobileno`='$contact' where id = '" . $_SESSION["id"] . "'";
    } else if ($_SESSION['user'] == 'doctor') {
        $q1 = "UPDATE doctor SET `doctorname`='$fname',`loginid`='$email',`mobileno`='$contact' where doctorid = '" . $_SESSION["id"] . "'";
    } else if ($_SESSION['user'] == 'patient') {
        $q1 = "UPDATE patient SET `patientname`='$fname',`loginid`='$email',`mobileno`='$contact',`address`='$alamat',`dob`='$dob', `Umur`='$umur',`Agama`= '$agama',`Pendidikan`= '$pendidikan',`Pekerjaan`='$pekerjaan',`Kawin`='$kawin',`NamaS`='$ns', `UmurS`='$umurS'
        , `AgamaS`='$agamaS', `PendidikanS`='$pendidikanS', `PekerjaanS`='$pekerjaanS', `TeleponS`='$telpS', `KawinS`='$kawinS' where patientid = '" . $_SESSION["id"] . "'";
    }

    if ($conn->query($q1) === TRUE) {
        $_SESSION['success'] = 'Record Successfully Updated';
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
    }
}
?>

<?php
if ($_SESSION['user'] == 'admin') {
    $que = "select * from  admin where id = '" . $_SESSION["id"] . "'";
    $query = $conn->query($que);
    while ($row = mysqli_fetch_array($query)) {
        extract($row);
        $fname = $row['fname'];
        $email = $row['loginid'];
        $contact = $row['mobileno'];
    }
} else if ($_SESSION['user'] == 'doctor') {
    $que = "select * from  doctor where doctorid = '" . $_SESSION["id"] . "'";
    $query = $conn->query($que);
    while ($row = mysqli_fetch_array($query)) {
        extract($row);
        $fname = $row['doctorname'];
        $email = $row['loginid'];
        $contact = $row['mobileno'];
    }
} else if ($_SESSION['user'] == 'patient') {
    $que = "select * from patient where patientid = '" . $_SESSION["id"] . "'";
    $query = $conn->query($que);
    while ($row = mysqli_fetch_array($query)) {
        extract($row);
        $fname = $row['patientname'];
        $email = $row['loginid'];
        $contact = $row['mobileno'];
        $alamat = $row['address'];
        $dob = $row['dob'];
        $umur = $row['Umur'];
        $agama = $row['Agama'];
        $pendidikan = $row['Pendidikan'];
        $pekerjaan = $row['Pekerjaan'];
        $kawin = $row['Kawin'];
        $ns = $row['NamaS'];
        $umurS = $row['UmurS'];
        $agamaS = $row['AgamaS'];
        $pendidikanS = $row['PendidikanS'];
        $pekerjaanS = $row['PekerjaanS'];
        $telpS = $row['TeleponS'];
        $kawinS = $row['KawinS'];
    }
}
?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Profile</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
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
                                    <form id="main" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $fname; ?>" placeholder="Enter first name....">
                                                <span class="messages"></span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $loginid; ?>" placeholder="Enter valid e-mail address..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No Telp</label>
                                            <div class="col-sm-4">
                                                <input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $mobileno; ?>" placeholder="Enter valid contact number..." minlength="10" maxlength="15" pattern="^\d+$">
                                                <span class="messages"></span>
                                            </div>
                                            <?php if ($_SESSION['user'] == 'patient') : ?>
                                                <label class="col-sm-2 col-form-label">Nama Suami</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="ns" name="ns" value="<?php echo $ns; ?>" placeholder="Masukkan nama suami anda...">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($_SESSION['user'] == 'patient') : ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" placeholder="Masukkan alamat yang benar...">
                                                </div>

                                                <label class="col-sm-2 col-form-label">Umur Suami</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="umurS" name="umurS" value="<?php echo $umurS; ?>" placeholder="Masukkan umur suami anda....">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" placeholder="Masukkan Tgl lahir...">
                                                </div>

                                                <label class="col-sm-2 col-form-label">Agama Suami</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" id="agamaS" name="agamaS">
                                                        <option value="" disabled selected>Pilih agama suami anda...
                                                        </option>
                                                        <option value="Islam" <?php echo ($agamaS == 'Islam') ? 'selected' : ''; ?>>Islam
                                                        </option>
                                                        <option value="Kristen" <?php echo ($agamaS == 'Kristen') ? 'selected' : ''; ?>>Kristen
                                                        </option>
                                                        <option value="Katolik" <?php echo ($agamaS == 'Katolik') ? 'selected' : ''; ?>>Katolik
                                                        </option>
                                                        <option value="Hindu" <?php echo ($agamaS == 'Hindu') ? 'selected' : ''; ?>>Hindu
                                                        </option>
                                                        <option value="Buddha" <?php echo ($agamaS == 'Buddha') ? 'selected' : ''; ?>>Buddha
                                                        </option>
                                                        <option value="Konghucu" <?php echo ($agamaS == 'Konghucu') ? 'selected' : ''; ?>>
                                                            Konghucu</option>
                                                        <option value="Konghucu" <?php echo ($agamaS == 'Lainnya') ? 'selected' : ''; ?>>Lainnya
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Umur</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur" readonly>
                                                </div>

                                                <label class="col-sm-2 col-form-label">Pendidikan Suami</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" id="pendidikanS" name="pendidikanS">
                                                        <option value="" disabled selected>Pilih Pendidikan Terakhir Suami
                                                            Anda</option>
                                                        <option value="TidakSekolah" <?php echo ($pendidikanS == 'TidakSekolah') ? 'selected' : ''; ?>>
                                                            Tidak Sekolah</option>
                                                        <option value="SD" <?php echo ($pendidikanS == 'SD') ? 'selected' : ''; ?>>SD
                                                            (Sekolah Dasar)</option>
                                                        <option value="SMP" <?php echo ($pendidikanS == 'SMP') ? 'selected' : ''; ?>>SMP
                                                            (Sekolah Menengah Pertama)</option>
                                                        <option value="SMA/SMK" <?php echo ($pendidikanS == 'SMA/SMK') ? 'selected' : ''; ?>>
                                                            SMA/SMK (Sekolah Menengah Atas/Sekolah Menengah Kejuruan)
                                                        </option>
                                                        <option value="Diploma" <?php echo ($pendidikanS == 'Diploma') ? 'selected' : ''; ?>>
                                                            Diploma</option>
                                                        <option value="Sarjana" <?php echo ($pendidikanS == 'Sarjana') ? 'selected' : ''; ?>>
                                                            Sarjana (S1)</option>
                                                        <option value="Magister" <?php echo ($pendidikanS == 'Magister') ? 'selected' : ''; ?>>
                                                            Magister (S2)</option>
                                                        <option value="Doktor" <?php echo ($pendidikanS == 'Doktor') ? 'selected' : ''; ?>>
                                                            Doktor (S3)</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Agama</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" id="agama" name="agama">
                                                        <option value="" disabled selected>Pilih agama anda...</option>
                                                        <option value="Islam" <?php echo ($agama == 'Islam') ? 'selected' : ''; ?>>Islam
                                                        </option>
                                                        <option value="Kristen" <?php echo ($agama == 'Kristen') ? 'selected' : ''; ?>>Kristen
                                                        </option>
                                                        <option value="Katolik" <?php echo ($agama == 'Katolik') ? 'selected' : ''; ?>>Katolik
                                                        </option>
                                                        <option value="Hindu" <?php echo ($agama == 'Hindu') ? 'selected' : ''; ?>>Hindu
                                                        </option>
                                                        <option value="Buddha" <?php echo ($agama == 'Buddha') ? 'selected' : ''; ?>>Buddha
                                                        </option>
                                                        <option value="Konghucu" <?php echo ($agama == 'Konghucu') ? 'selected' : ''; ?>>Konghucu
                                                        </option>
                                                        <option value="Lainnya" <?php echo ($agama == 'Lainnya') ? 'selected' : ''; ?>>Lainnya
                                                        </option>
                                                    </select>
                                                </div>

                                                <label class="col-sm-2 col-form-label">Pekerjaan Suami</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="pekerjaanS" name="pekerjaanS" value="<?php echo $pekerjaanS; ?>" placeholder="Masukkan pekerjaan suami anda...">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pendidikan</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" id="pendidikan" name="pendidikan">
                                                        <option value="" disabled selected>Pilih Pendidikan Terakhir Anda
                                                        </option>
                                                        <option value="TidakSekolah" <?php echo ($pendidikan == 'TidakSekolah') ? 'selected' : ''; ?>>
                                                            Tidak Sekolah</option>
                                                        <option value="SD" <?php echo ($pendidikan == 'SD') ? 'selected' : ''; ?>>SD
                                                            (Sekolah Dasar)</option>
                                                        <option value="SMP" <?php echo ($pendidikan == 'SMP') ? 'selected' : ''; ?>>SMP
                                                            (Sekolah Menengah Pertama)</option>
                                                        <option value="SMA/SMK" <?php echo ($pendidikan == 'SMA/SMK') ? 'selected' : ''; ?>>
                                                            SMA/SMK (Sekolah Menengah Atas/Sekolah Menengah Kejuruan)
                                                        </option>
                                                        <option value="Diploma" <?php echo ($pendidikan == 'Diploma') ? 'selected' : ''; ?>>
                                                            Diploma</option>
                                                        <option value="Sarjana" <?php echo ($pendidikan == 'Sarjana') ? 'selected' : ''; ?>>
                                                            Sarjana (S1)</option>
                                                        <option value="Magister" <?php echo ($pendidikan == 'Magister') ? 'selected' : ''; ?>>
                                                            Magister (S2)</option>
                                                        <option value="Doktor" <?php echo ($pendidikan == 'Doktor') ? 'selected' : ''; ?>>
                                                            Doktor (S3)</option>
                                                    </select>
                                                </div>
                                                <label class="col-sm-2 col-form-label">No Telp Suami</label>
                                                <div class="col-sm-4">
                                                    <input type="tel" class="form-control" id="telpS" name="telpS" value="<?php echo $telpS; ?>" placeholder="Masukkan nomer suami anda..." minlength="10" maxlength="15" pattern="^\d+$">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $pekerjaan; ?>" placeholder="Masukkan pekerjaan anda...">
                                                </div>

                                                <label class="col-sm-2 col-form-label">Suami Kawin ke</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="kawinS" name="kawinS" value="<?php echo $kawinS; ?>" placeholder="Suami kawin yang keberapa kali..." min="1">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Kawin ke</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="kawin" name="kawin" value="<?php echo $kawin; ?>" placeholder="Kawin yang keberapa kali..." min="1">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_update" class="btn btn-primary m-b-0">Update</button>
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

                <?php include_once('footer.php'); ?>

                <link rel="stylesheet" href="popup_style.css">
                <?php if (!empty($_SESSION['success'])) {  ?>
                    <div class="popup popup--icon -success js_success-popup popup--visible">
                        <div class="popup__background"></div>
                        <div class="popup__content">
                            <h3 class="popup__content__title">
                                Success
                            </h3>
                            <p><?php echo $_SESSION['success']; ?></p>
                            <p>
                                <?php echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>"; ?>
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
                            </h3>
                            <p><?php echo $_SESSION['error']; ?></p>
                            <p>
                                <button class="button button--error" data-for="js_error-popup">Close</button>
                            </p>
                        </div>
                    </div>
                <?php unset($_SESSION["error"]);
                } ?>
                <script>
                    function hitungUmur() {
                        var dob = document.getElementById("dob").value;
                        var today = new Date();
                        var birthDate = new Date(dob);
                        var age = today.getFullYear() - birthDate.getFullYear();

                        var m = today.getMonth() - birthDate.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }

                        document.getElementById("umur").value = age;
                    }
                    document.addEventListener("DOMContentLoaded", function() {
                        hitungUmur();
                    });

                    // Memanggil fungsi hitungUmur saat tanggal lahir berubah
                    document.getElementById("dob").addEventListener("change", hitungUmur);
                </script>
            </div>
        </div>
    </div>
</div>