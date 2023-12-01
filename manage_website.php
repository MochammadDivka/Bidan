<?php
require_once('check_login.php');
include('head.php');
include('header.php');
include('sidebar.php');
include('connect.php');

if (isset($_POST["btn_web"])) {
    $business_name = $_POST['business_name'];
    $business_email = $_POST['business_email'];
    $business_web = $_POST['business_web'];
    $portal_addr = $_POST['portal_addr'];
    $addr = $_POST['addr'];
    $curr_sym = $_POST['curr_sym'];
    $curr_position = $_POST['curr_position'];
    $front_end_en = $_POST['front_end_en'];
    $date_format = $_POST['date_format'];
    $def_tax = $_POST['def_tax'];
    $logo = $row['logo']; // Assuming $row is defined somewhere

    $target_dir = "uploadImage/Logo/";

    function handleFileUpload($fileInput, $targetDir, $oldImage)
    {
        if ($_FILES[$fileInput]["error"] !== UPLOAD_ERR_OK) {
            echo "File upload failed with error code: " . $_FILES[$fileInput]["error"];
            return $oldImage;
        }

        $image = $targetDir . basename($_FILES[$fileInput]["name"]);

        if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $image)) {
            @unlink($targetDir . $oldImage);
            return basename($_FILES[$fileInput]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            return $oldImage;
        }
    }

    $logo = handleFileUpload("logo", $target_dir, $_POST['old_logo']);

    $q1 = $conn->prepare("UPDATE `manage_website` SET 
        `business_name`=?, `business_email`=?, `business_web`=?, `portal_addr`=?, `addr`=?,
        `curr_sym`=?, `curr_position`=?, `front_end_en`=?, `date_format`=?, `def_tax`=?, `logo`=?
    ");
    $q1->bind_param(
        "sssssssssss",
        $business_name, $business_email, $business_web, $portal_addr, $addr,
        $curr_sym, $curr_position, $front_end_en, $date_format, $def_tax, $logo
    );

    if ($q1->execute()) {
        $_SESSION['success'] = 'Record Successfully Updated';
        header("Location: manage_website.php");
        exit();
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
    }
}

$que = "SELECT * FROM manage_website";
$query = $conn->query($que);
while ($row = mysqli_fetch_array($query)) {
    extract($row);
}

?>

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Website Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Website Management</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                       <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Logo</label>
                        <div class="col-sm-9">
                            <image class="profile-img" src="uploadImage/Logo/<?= $logo ?>" style="height:35%;width:25%;">
                            <input type="hidden" value="<?= $logo ?>" name="old_logo">
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                </div

                                        



                                        <button type="submit" name="btn_web" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success"  data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>

    <script type="text/javascript">
    function refresh_cls() {
      
                  setTimeout(function(){// wait for 5 secs(2)
                  location.reload(); // then reload the page.(3)
             }, 1000);
      }  
    </script>