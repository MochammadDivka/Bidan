 <?php
    include 'connect.php';
    $sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
    $result = $conn->query($sql);
    $ro = mysqli_fetch_array($result);

    ?>

 <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-Vlud+3BFi4dUnQDBB1sSzVw+9l7WpFn4QgjMyCvXuu7ZE9pd7/3kxbsgCpepI6dP" crossorigin="anonymous">
 </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
 </script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <div class="pcoded-main-container">
     <div class="pcoded-wrapper">
         <nav class="pcoded-navbar">
             <div class="pcoded-inner-navbar main-menu">
                 <div class="pcoded-navigatio-lavel">Navigation</div>
                 <ul class="pcoded-item pcoded-left-item">
                     <li class="">
                         <a href="index.php">
                             <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                             <span class="pcoded-mtext">Dashboard</span>
                         </a>
                     </li>

                     <?php if (($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor') || ($_SESSION['user'] == 'patient')) { ?>
                         <li class="pcoded-hasmenu">
                             <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                                 <span class="pcoded-mtext">Pemeriksaan</span>
                             </a>
                             <ul class="pcoded-submenu">
                                 <?php if ($_SESSION['user'] == 'patient') { ?>
                                     <li class="">
                                         <a href="appointment.php">
                                             <span class="pcoded-mtext">Pemeriksaan Baru</span>
                                         </a>
                                     </li>
                                 <?php } ?>
                                 <?php if (($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor')) { ?>
                                     <li class="">
                                         <a href="view-pending-appointment.php">
                                             <span class="pcoded-mtext">Persetujuaan Pemeriksaan</span>
                                         </a>
                                     </li>
                                     <li class="">
                                         <a href="formproses.php">
                                             <span class="pcoded-mtext">Proses Pemeriksaan</span>
                                         </a>
                                     </li>

                                 <?php } ?>
                                 <?php if ($_SESSION['user'] == 'patient') { ?>
                                     <li class="">
                                         <a href="view-pending-appointment.php">
                                             <span class="pcoded-mtext">Menunggu Persetujuan</span>
                                         </a>
                                     </li>
                                 <?php } ?>
                             </ul>
                         </li>
                     <?php } ?>

                     <?php if ($_SESSION['user'] == 'admin') { ?>
                         <li class="pcoded-hasmenu">
                             <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                 <span class="pcoded-mtext">Bidan</span>
                             </a>
                             <ul class="pcoded-submenu">

                                 <li class="">
                                     <a href="doctor.php">
                                         <span class="pcoded-mtext">Tambah Bidan</span>
                                     </a>
                                 </li>

                                 <li class="">
                                     <a href="view-doctor.php">
                                         <span class="pcoded-mtext">Lihat data bidan</span>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                     <?php } ?>



                     <?php if ($_SESSION['user'] == 'patient') { ?>
                         <li class="pcoded-hasmenu">
                             <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                 <span class="pcoded-mtext">Riwayat Pemeriksaan</span>
                             </a>
                             <ul class="pcoded-submenu">

                                 <li class="">
                                     <a href="tabelRK.php">
                                         <span class="pcoded-mtext">Riwayat Kehamilan Anak</span>
                                     </a>
                                 </li>
                                 <li class="">
                                     <a href="tabelKS.php">
                                         <span class="pcoded-mtext">Pemeriksaan Kehamilan</span>
                                     </a>
                                 </li>
                                 <li class="">
                                     <a href="tabelKU.php">
                                         <span class="pcoded-mtext">Kunjungan Ulang KB</span>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                     <?php } ?>




                     <?php if (($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor')) { ?>
                         <li class="pcoded-hasmenu">
                             <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                 <span class="pcoded-mtext">Pasien</span>
                             </a>
                             <ul class="pcoded-submenu">
                                 <?php if ($_SESSION['user'] == 'admin') { ?>
                                     <li class="">
                                         <a href="patient.php">
                                             <span class="pcoded-mtext">Tambah Pasien</span>
                                         </a>
                                     </li>
                                 <?php } ?>
                                 <li class="">
                                     <a href="view-patient.php">
                                         <span class="pcoded-mtext">Lihat Data Pasien</span>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                     <?php } ?>




                     <?php if ($_SESSION['user'] == 'admin') { ?>
                         <li class="pcoded-hasmenu">
                             <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                 <span class="pcoded-mtext">Layanan</span>
                             </a>
                             <ul class="pcoded-submenu">

                                 <li class="">
                                     <a href="department.php">
                                         <span class="pcoded-mtext">Tambah Layanan</span>
                                     </a>
                                 </li>

                                 <li class="">
                                     <a href="view-department.php">
                                         <span class="pcoded-mtext">Lihat Layanan</span>
                                     </a>
                                 </li>


                             </ul>
                         </li>
                     <?php } ?>



                     <li>
                         <a href="javascript:void(0);" onclick="confirmLogout()">
                             <i class="feather icon-log-out"></i> Logout
                         </a>
                     </li>
                 </ul>
             </div>
         </nav>

         <script>
             function confirmLogout() {
                 Swal.fire({
                     title: 'Keluar',
                     text: 'Apakah anda yakin ingin keluar?',
                     icon: 'question',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Ya, keluar!'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = "logout.php";
                     }
                 });
             }
         </script>