 <?php
    include('connect.php');
    $sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
    $result = $conn->query($sql);
    $ro = mysqli_fetch_array($result);

    ?>


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
                             <?php if (($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'patient')) { ?>
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
                             <!-- <li class="">
            <a href="view-appointments-approved.php">
                <span class="pcoded-mtext">View Approved Appointments</span>
            </a>
        </li> -->
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
                             <span class="pcoded-mtext">Doctors</span>
                         </a>
                         <ul class="pcoded-submenu">

                             <li class="">
                                 <a href="doctor.php">
                                     <span class="pcoded-mtext">New Doctor</span>
                                 </a>
                             </li>

                             <li class="">
                                 <a href="view-doctor.php">
                                     <span class="pcoded-mtext">View Doctor</span>
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
                             <span class="pcoded-mtext">Service</span>
                         </a>
                         <ul class="pcoded-submenu">

                             <li class="">
                                 <a href="department.php">
                                     <span class="pcoded-mtext">Add Department</span>
                                 </a>
                             </li>

                             <li class="">
                                 <a href="view-department.php">
                                     <span class="pcoded-mtext">View Department</span>
                                 </a>
                             </li>

                             <li class="">
                                 <a href="treatment.php">
                                     <span class="pcoded-mtext">Add Treatment type</span>
                                 </a>
                             </li>

                             <li class="">
                                 <a href="view-treatment.php">
                                     <span class="pcoded-mtext">View Treatment types</span>
                                 </a>
                             </li>

                             <li class="">
                                 <a href="medicine.php">
                                     <span class="pcoded-mtext">Add Medicine</span>
                                 </a>
                             </li>

                             <li class="">
                                 <a href="view-medicine.php">
                                     <span class="pcoded-mtext">View Medicine</span>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <?php } ?>



                     <li>
                         <a href="logout.php">
                             <i class="feather icon-log-out"></i> Logout
                         </a>
                     </li>
                 </ul>
             </div>
         </nav>