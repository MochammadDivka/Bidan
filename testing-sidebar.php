<?php
include('connect.php');
$sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
$result = $conn->query($sql);
$ro = mysqli_fetch_array($result);

?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

<script src="./files/bs/sidebars.js"></script>
<script src="./files/bs/assets/js/color-modes.js"></script>
<link rel="stylesheet" href="./files/bs/sidebars.css">
<link href="./files/bs/assets/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.b-example-divider {
    width: 100%;
    height: 3rem;
    background-color: rgba(0, 0, 0, 0.1);
    border: solid rgba(0, 0, 0, 0.15);
    border-width: 1px 0;
    box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
        inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
}

.b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
}

.bi {
    vertical-align: -0.125em;
    fill: currentColor;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}

.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}

.btn-bd-primary {
    --bd-violet-bg: #712cf9;
    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-violet-bg);
    --bs-btn-border-color: var(--bd-violet-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #6528e0;
    --bs-btn-hover-border-color: #6528e0;
    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #5a23c8;
    --bs-btn-active-border-color: #5a23c8;
}

.bd-mode-toggle {
    z-index: 1500;
}

.bd-mode-toggle .dropdown-menu .active .bi {
    display: block !important;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
    integrity="sha384-Vlud+3BFi4dUnQDBB1sSzVw+9l7WpFn4QgjMyCvXuu7ZE9pd7/3kxbsgCpepI6dP" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path
            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
        <path
            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
            d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
</svg>
<div class="d-flex flex-nowrap pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="flex-shrink-0 p-3" style="width: 280px">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                        <svg class="bi pe-none me-2" width="30" height="24">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                        <span class="fs-5 fw-semibold">Collapsible</span>
                    </a>
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                Home
                            </button>
                            <div class="collapse show" id="home-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                                Dashboard
                            </button>
                            <div class="collapse" id="dashboard-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                                Orders
                            </button>
                            <div class="collapse" id="orders-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                Account
                            </button>
                            <div class="collapse" id="account-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">New...</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sign
                                            out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
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
                            <span class="pcoded-mtext">Layaa</span>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="./files/bs/assets/dist/js/bootstrap.bundle.min.js"></script>
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