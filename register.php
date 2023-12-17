<?php
session_start();
include('connect.php');

if (isset($_POST['btn_register'])) {
    extract($_POST);

    // Hash the password for security
    $passw = hash('sha256', $_POST['password']);
    function createSalt()
    {
        return '2123293dsj2hu2nikhiljdsd';
    }
    $salt = createSalt();
    $pass = hash('sha256', $salt . $passw);

    // Get the current date and time
    date_default_timezone_set('Asia/Jakarta');
    $admissionDate = date('Y-m-d');
    $admissionTime = date('H:i:s');

    // Insert user data into the 'patient' table
    $sql = "INSERT INTO patient(patientname,admissiondate,admissiontime,address,mobileno,city,pincode,loginid,password,bloodgroup,gender,dob,status) values('$_POST[patientname]','$admissionDate','$admissionTime','$_POST[address]','$_POST[mobilenumber]','$_POST[city]','$_POST[pincode]','$_POST[loginid]','$pass','$_POST[select2]','$_POST[gender]','$_POST[dateofbirth]','Active')";

    if (mysqli_query($conn, $sql)) { ?>
<link rel="stylesheet" href="popup_style.css">
<div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Success
        </h3>
        <p>Daftar Berhasil</p>
        <p>
            <!-- // Registration successful, redirect to login page
        // echo "<script>alert('Registration Successful. You can now log in.');</script>"; -->
            <?php echo "<script>setTimeout(\"location.href = 'login.php';\", 1500);</script>"; ?>
        </p>
    </div>
</div>
<?php
    } else { ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Error
        </h3>
        <p>Regristrasi Gagal. Silahkan Coba Lagi </p>
        <p>
            <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
        </p>
    </div>
</div>

<!-- // Registration failed
        echo "<script>alert('Registration failed. Please try again.');</script>"; -->
<?php
    }
}
?>

<?php
$que = "select * from manage_website";
$query = $conn->query($que);
while ($row = mysqli_fetch_array($query)) {
    extract($row);
    $business_name = $row['business_name'];
    $business_email = $row['business_email'];
    $business_web = $row['business_web'];
    $portal_addr = $row['portal_addr'];
    $addr = $row['addr'];
    $curr_sym = $row['curr_sym'];
    $curr_position = $row['curr_position'];
    $front_end_en = $row['front_end_en'];
    $date_format = $row['date_format'];
    $def_tax = $row['def_tax'];
    $logo = $row['logo'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Patient Registration</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin, Responsive">
    <meta name="author" content="Nikhil Bhalerao +919423979339.">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
</head>

<body class="fix-menu">
    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="auth-box card">
                        <div class="text-center">
                            <img class="profile-img" src="uploadImage/Logo/<?php echo $logo; ?>" style="width: 60%">
                        </div>
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h5 class="text-center txt-primary">Pendaftaran Pasien</h5>
                                </div>
                            </div>
                            <form method="POST">
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">Nama
                                        Pasien</label>
                                    <input type="text" name="patientname" class="form-control" required=""
                                        placeholder="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title"
                                        style="margin-bottom: 2px;">Alamat</label>
                                    <input type="text" name="address" class="form-control" required="" placeholder="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">No
                                        Telp</label>
                                    <input type="number" name="mobilenumber" class="form-control" required=""
                                        placeholder="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">Kota</label>
                                    <input type="text" name="city" class="form-control" required="" placeholder="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">Kode
                                        POS</label>
                                    <input type="text" name="pincode" class="form-control" required="" placeholder="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">Email</label>
                                    <input type="email" name="loginid" class="form-control" required="" placeholder="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title"
                                        style="margin-bottom: 2px;">Password</label>
                                    <input type="password" name="password" class="form-control" required=""
                                        placeholder="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">Golongan
                                        Darah</label>
                                    <select name="select2" class="form-control" required="">
                                        <option value="">Pilih Golongan Darah</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">Jenis
                                        Kelamin</label>
                                    <select name="gender" class="form-control" required="">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Male">Pria</option>
                                        <option value="Female">Wanita</option>
                                    </select>
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="patientname" class="sub-title" style="margin-bottom: 2px;">Tanggal Lahir
                                    </label>
                                    <input type="date" name="dateofbirth" class="form-control" required=""
                                        placeholder="">
                                    <span class="form-bar"></span>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="btn_register"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">

                                        <p class="text-inverse text-left"><a href="index.php"><b class="f-w-600">Kembali
                                                    ke login</b></a></p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <script type="text/javascript" src="files/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js">
    </script>
    <script type="text/javascript"
        src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="files/assets/js/common-pages.js"></script>
</body>

</html>