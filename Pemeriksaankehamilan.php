<?php
require_once('check_login.php');
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemeriksaan kehamilan</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <style>
    body {
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="mb-0">
          Pemeriksaan kehamilan

        </h3>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group row">
            <label for="bentuk_tubuh" class="col-sm-4 col-form-label">Nama Pasien</label>
            <div class="col-sm-8">
              <select class="form-control" name="patient" id="patient" required="">
                <option>-- Pilih Pasien--</option>
                <?php
                $sqlpatient = "SELECT * FROM proses WHERE status = 'belum selesai'";

                $qsqlpatient = mysqli_query($conn, $sqlpatient);
                while ($rspatient = mysqli_fetch_array($qsqlpatient)) {
                  $adawd = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM patient WHERE patientid = '$rspatient[patientid]'"));

                  if ($rspatient['patientid'] == $rsedit['patientid']) {
                    echo "<option value='" . $rspatient['patientid'] . "' selected>" . $rspatient['patientid'] . " - " . $adawd['patientname'] . "</option>";
                  } else {
                    echo "<option value='" . $rspatient['patientid'] . "'>" . $rspatient['patientid'] . " - " . $adawd['patientname'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="Tanggal" class="col-sm-4 col-form-label">Tanggal</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" id="Tanggal" name="tanggal" />
            </div>
          </div>


          <div class="form-group row">
            <label for="BeratBadan" class="col-sm-4 col-form-label">Berat Badan (KG)</label>
            <div class="col-sm-8 ry-input-group" style="display: flex; column-gap: 10px;">
              <input type="text" class="form-control" id="BeratBadan" name="beratBadan">
              <button type="button" ry-btn-target="#BeratBadan" onclick="resetValue(this)" class="btn btn-danger btn-md">Reset</button>
            </div>
          </div>



          <div class="form-group row">
            <label for="TekananDarah" class="col-sm-4 col-form-label">Tekanan Darah (mmHg)</label>
            <div class="col-sm-8 ry-input-group" style="display: flex; column-gap: 10px;">
              <input type="text" class="form-control" id="TekananDarah" name="tekananDarah" />
              <button type="button" ry-btn-target="#TekananDarah" onclick="resetValue(this)" class="btn btn-danger btn-md">Reset</button>
            </div>
          </div>




          <div class="form-group row">
            <label for="TinggiFundusUteri" class="col-sm-4 col-form-label">Tinggi Fundus Uteri (cm)</label>
            <div class="col-sm-8 ry-input-group" style="display: flex; column-gap: 10px;">
              <input type="text" class="form-control" id="TinggiFundusUteri" name="tinggiFundusUteri" />
              <button type="button" ry-btn-target="#TinggiFundusUteri" onclick="resetValue(this)" class="btn btn-danger btn-md">Reset</button>
            </div>
          </div>


          <div class="form-group row">
            <label for="UmurKehamilan" class="col-sm-4 col-form-label">Umur Kehamilan (minggu)</label>
            <div class="col-sm-8 ry-input-group" style="display: flex; column-gap: 10px;">
              <input type="text" class="form-control" id="UmurKehamilan" name="umurKehamilan" />
              <button type="button" ry-btn-target="#UmurKehamilan" onclick="resetValue(this)" class="btn btn-danger btn-md">Reset</button>
            </div>
          </div>




          <div class="form-group row">
            <label for="Letak janin" class="col-sm-4 col-form-label">Letak janin</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Letak janin" name="letakJanin" />
            </div>
          </div>



          <div class="form-group row">
            <label for="Djj" class="col-sm-4 col-form-label">Djj</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Djj" name="djj" />
            </div>
          </div>



          <div class="form-group row">
            <label for="Oed" class="col-sm-4 col-form-label">Oed</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Oed" name="oed" />
            </div>
          </div>


          <div class="form-group row">
            <label for="Keluhan" class="col-sm-4 col-form-label">Keluhan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Keluhan" name="keluhan" />
            </div>
          </div>



          <div class="form-group row">
            <label for="Therapie / Penyuluhan" class="col-sm-4 col-form-label">Therapie / Penyuluhan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id=" Therapie / Penyuluhan" name="therapiePenyuluhan" />
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-8 offset-sm-4">
              <button type="submit" name="Pemeriksaankehamilan-submit" class="btn btn-success">Submit</button>

            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <a href="proses.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
            </div>
          </div>
      </div>
</body>

<script>
  function resetValue($element) {
    target = document.querySelector(`.ry-input-group ${$element.getAttribute('ry-btn-target')}`);
    target.value = '';
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    var beratBadanInput = $('#BeratBadan');


    beratBadanInput.on('input', function() {

      var nilaiInput = $(this).val();

      nilaiInput = nilaiInput.replace(/\D/g, '');


      $(this).val(nilaiInput + ' KG');
    });
  });
</script>
<script>
  $(document).ready(function() {

    var tekananDarahInput = $('#TekananDarah');


    tekananDarahInput.on('input', function() {

      var nilaiInput = $(this).val();


      nilaiInput = nilaiInput.replace(/\D/g, '');


      $(this).val(nilaiInput + ' mmHg');
    });
  });
  $(document).ready(function() {

    var tekananDarahInput = $('#UmurKehamilan');


    tekananDarahInput.on('input', function() {

      var nilaiInput = $(this).val();


      nilaiInput = nilaiInput.replace(/\D/g, '');


      $(this).val(nilaiInput + ' minggu');
    });
  });
</script>
<script>
  $(document).ready(function() {

    var tinggiFundusUteriInput = $('#TinggiFundusUteri');


    tinggiFundusUteriInput.on('input', function() {
      // Dapatkan nilai input
      var nilaiInput = $(this).val();


      nilaiInput = nilaiInput.replace(/\D/g, '');


      $(this).val(nilaiInput + ' cm');
    });
  });
</script>



</html>

<?php
if (isset($_GET) || isset($_POST)) {
  if (isset($_POST['Pemeriksaankehamilan-submit'])) {
    mysqli_query(
      $conn,
      "INSERT INTO `pemeriksaankehamilan` (
        `patient`, 
        `tgl`, 
        `bb`, 
        `tekanandarah`, 
        `tinggi_fundusuteri`, 
        `umur_kehamilan`, 
        `letakjanin`, 
        `djj`, 
        `oed`, 
        `keluhan`, 
        `penyuluhan`
       
    )  VALUES (
        '{$_POST['patient']}',
        '{$_POST['tanggal']}',
        '{$_POST['beratBadan']}',
        '{$_POST['tekananDarah']}',
        '{$_POST['tinggiFundusUteri']}',
        '{$_POST['umurKehamilan']}',
        '{$_POST['letakJanin']}',
        '{$_POST['djj']}',
        '{$_POST['oed']}',
        '{$_POST['keluhan']}',
        '{$_POST['therapiePenyuluhan']}'
    )"
    );
  }
}

?>