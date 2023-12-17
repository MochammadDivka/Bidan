<?php
require_once('check_login.php');
include_once('head.php');
include_once('header.php');
include_once('sidebar.php');
include_once('connect.php');

if (isset($_POST['btn_submit'])) {
    if (isset($_GET['editid'])) {
        $sql = "UPDATE doctor SET doctorname=?, mobileno=?, departmentid=?, loginid=?, status=?, education=?, experience=?, consultancy_charge=? WHERE doctorid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssidi", $_POST['doctorname'], $_POST['mobilenumber'], $_POST['department'], $_POST['loginid'], $_POST['status'], $_POST['education'], $_POST['experience'], $_POST['consultancy_charge'], $_GET['editid']);
        if ($stmt->execute()) {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Bidan berhasil disimpan !</p>
                    <p>
                        <?php echo "<script>setTimeout(\"location.href = 'view-doctor.php';\",1500);</script>"; ?>
                    </p>
                </div>
            </div>
        <?php
        } else {
            echo $stmt->error;
        }
    } else {
        $passw = hash('sha256', $_POST['password']);
        function createSalt()
        {
            return '2123293dsj2hu2nikhiljdsd';
        }
        $salt = createSalt();
        $sql = "INSERT INTO doctor (doctorname, mobileno, departmentid, loginid, password, status, education, experience, consultancy_charge) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssiss", $_POST['doctorname'], $_POST['mobilenumber'], $_POST['department'], $_POST['loginid'], $passw, $_POST['status'], $_POST['education'], $_POST['experience'], $_POST['consultancy_charge']);
        if ($stmt->execute()) {
        ?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Doctor Record Inserted Successfully</p>
                    <p>
                        <?php echo "<script>setTimeout(\"location.href = 'view-doctor.php';\",1500);</script>"; ?>
                    </p>
                </div>
            </div>
<?php
        } else {
            echo $stmt->error;
        }
    }
}

if (isset($_GET['editid'])) {
    $sql = "SELECT * FROM doctor WHERE doctorid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['editid']);
    $stmt->execute();
    $rsedit = $stmt->get_result()->fetch_assoc();
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
                                    <h4>Kebidanan</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Bidan</a></li>
                                    <li class="breadcrumb-item"><a href="add_user.php">Bidan</a></li>
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
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Bidan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="doctorname" id="doctorname" placeholder="Enter name...." required="" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['doctorname'];
                                                                                                                                                                            } ?>">
                                                <span class="messages"></span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">No Telp</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Enter mobilenumber...." required="" value="<?php echo $rsedit['mobileno']; ?>">
                                                <span class "messages"> </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Layanan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="department" id="department" placeholder="Enter lastname...." required="">
                                                    <option value="">-- Select One --</option>
                                                    <?php
                                                    $sqldepartment = "SELECT * FROM department WHERE status='Active'";
                                                    $stmt = $conn->prepare($sqldepartment);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    while ($rsdepartment = $result->fetch_assoc()) {
                                                        if ($rsdepartment['departmentid'] == $rsedit['departmentid']) {
                                                            echo "<option value='" . $rsdepartment['departmentid'] . "' selected>" . $rsdepartment['departmentname'] . "</option>";
                                                        } else {
                                                            echo "<option value='" . $rsdepartment['departmentid'] . "'>" . $rsdepartment['departmentname'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="loginid" id="loginid" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                echo $rsedit['loginid'];
                                                                                                                            } ?>" />
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <?php if (!isset($_GET['editid'])) { ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="password" name="password" id="password" pattern=".{8,}" required />
                                                    <span class="messages"></span>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="password" name="cnfirmpassword" id="cnfirmpassword" pattern=".{8,}" required />
                                                    <span class="messages" id="confirm-pw" style="color: red;"></span>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Terakhir pendidikan</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="education" id="education" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                    echo $rsedit['education'];
                                                                                                                                } ?>" />
                                            </div>
                                            <label class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="experience" id="experience" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                        echo $rsedit['experience'];
                                                                                                                                    } ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Consultancy Charge</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="consultancy_charge" id="consultancy_charge" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                        echo $rsedit['consultancy_charge'];
                                                                                                                                                    } ?>" />
                                            </div>
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-4">
                                                <select name="status" id="status" class="form-control" required="">
                                                    <option value="">-- Select One --</option>
                                                    <option value="Active" <?php if (isset($_GET['editid'])) {
                                                                                if ($rsedit['status'] == 'Active') {
                                                                                    echo 'selected';
                                                                                }
                                                                            } ?>>Active
                                                    </option>
                                                    <option value="Inactive" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['status'] == 'Inactive') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Inactive
                                                    </option>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>
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

<?php include_once('footer.php'); ?>

<script type="text/javascript">
    $('#main').keyup(function() {
        $('#confirm-pw').html('');
    });

    $('#cnfirmpassword').change(function() {
        if ($('#cnfirmpassword').val() !== $('#password').val()) {
            $('#confirm-pw').html('Password Not Match');
        }
    });

    $('#password').change(function() {
        if ($('#cnfirmpassword').val() !== $('#password').val()) {
            $('#confirm-pw').html('Password Not Match');
        }
    });
</script>