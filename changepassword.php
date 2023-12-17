<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php if ($_SESSION['user'] == 'doctor ' || $_SESSION['user'] == 'admin') {
  include('header.php');
  include('sidebar.php');
} ?>

<?php
include('connect.php');

if ($_SESSION["user"] == 'admin') {
  $q = "select * from  admin where id = '" . $_SESSION['id'] . "'";
} else if ($_SESSION["user"] == 'doctor') {
  $q = "select * from  doctor where doctorid = '" . $_SESSION['id'] . "'";
} else if ($_SESSION["user"] == 'patient') {
  $q = "select * from  patient where patientid = '" . $_SESSION['id'] . "'";
}

$q1 = $conn->query($q);
while ($row = mysqli_fetch_array($q1)) {
  extract($row);
  $db_pass = $row['password'];
}

if (isset($_POST["btn_password"])) {

  $old = hash('sha256', $_POST['old_password']);
  $pass_new = hash('sha256', $_POST['new_password']);
  $confirm_new = hash('sha256', $_POST['confirm_password']);
  //$passw = hash('sha256',$p);
  //echo $pass_new;
  function createSalt()
  {
    return '2123293dsj2hu2nikhiljdsd';
  }
  $salt = createSalt();
  $old_pass =  hash('sha256', $salt . $old);
  $new_pass =  hash('sha256', $salt . $pass_new);
  $confirm =  hash('sha256', $salt . $confirm_new);

  if ($db_pass != $old_pass) { ?>
    <?php $_SESSION['error'] = 'Kata sandi lama tidak sesuai'; ?>
    <!--  <script>
    alert('OLD Paasword not matched');
    </script> -->
  <?php } else if ($new_pass != $confirm) { ?>
    <?php $_SESSION['error'] = 'Kata sandi baru dan konfirmasi kata sandi tidak sesuai'; ?>
    <!--  <script>
    alert('NEW Password and CONFIRM password not Matched');
    </script> -->
  <?php } else {
    //$pass = md5($_POST['password']);

    if ($_SESSION["user"] == 'admin') {
      $sql = "update  admin set `password`='$confirm' where id = '" . $_SESSION['id'] . "'";
    } else if ($_SESSION["user"] == 'doctor') {
      $sql = "update  doctor set `password`='$confirm' where doctorid = '" . $_SESSION['id'] . "'";
    } else if ($_SESSION["user"] == 'patient') {
      $sql = "update  patient set `password`='$confirm' where patientid = '" . $_SESSION['id'] . "'";
    }

    $res = $conn->query($sql);
  ?>

    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Bq1kOasFEiQVG5l5d7We5kWVw+LlP2HJRnbSH26T1j7Q0zaMM5eUC4RQYOYc7bLrsCcrzW+HHUJBK2pQgA2s9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Berhasil !!
        </h3>
        <p>Kata sandi telah diperbarui...</p>
        <p>
          <?php echo "<script>setTimeout(\"location.href = 'changepassword.php';\",1500);</script>"; ?>
        </p>
      </div>
    </div>
<?php

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
                  <h4>Ganti Kata Sandi</h4>
                  <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a href="changepassword.php">Ganti Kata Sandi</a>
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
                <div class="card-header">
                  <!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                </div>
                <div class="card-block">
                  <form id="main" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kata Sandi Lama</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="old_password" placeholder="Kata Sandi Lama" required="">
                        <span class="messages"></span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="new_password" placeholder="Masukkan Kata Sandi Baru" required="">
                        <span class="messages"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="repeat-password" name="confirm_password" placeholder="Konfirmasi Kata Sandi" required="">
                        <span class="messages"></span>
                      </div>
                    </div>






                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <div class="col-sm-10">
                        <button type="submit" name="btn_password" class="btn btn-primary m-b-0">Submit</button>
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


<?php include('footer.php'); ?>

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
        <button class="button button--success" data-for="js_success-popup">Close</button>
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
  var addButtonTrigger = function addButtonTrigger(el) {
    el.addEventListener('click', function() {
      var popupEl = document.querySelector('.' + el.dataset.for);
      popupEl.classList.toggle('popup--visible');
    });
  };

  Array.from(document.querySelectorAll('button[data-for]')).
  forEach(addButtonTrigger);
</script>