<?php
include_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    <link rel="stylesheet" href="sd.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<?php $userId = $_SESSION['patientid']; // Adjust this based on your session variable
$query = "SELECT Agama, Pendidikan, Pekerjaan, Kawin, NamaS, UmurS, AgamaS, PendidikanS, PekerjaanS, TeleponS, KawinS FROM patient WHERE patientid = $userId";

$result = mysqli_query($conn, $query);

if ($result) {
    $userData = mysqli_fetch_assoc($result);
    $profileComplete = checkProfileCompleteness($userData);
    // echo json_encode(['profileComplete' => $profileComplete]);
} else {
    // Handle database query error
    echo json_encode(['error' => 'Database error']);
}

function checkProfileCompleteness($userData)
{
    $requiredFields = ['Agama', 'Pendidikan', 'Pekerjaan', 'Kawin', 'NamaS', 'UmurS', 'AgamaS', 'PendidikanS', 'PekerjaanS', 'TeleponS', 'KawinS'];

    foreach ($requiredFields as $field) {
        if (empty($userData[$field]) || trim($userData[$field]) === "") {
            return false;
        }
    }
    return true;
}
?>

<body>
    <div class="btn">
        <span> <i class="feather icon-menu"></i></span>
    </div>

    <nav class="sidebar">
        <div class="text">XieMedical</div>
        <ul>
            <li class="active"><a href="index.php"><i class="feather icon-home"></i> Home</a></li>
            <li>
                <a href="javascript:void(0)" class="feat-btn"><i class="feather icon-user"></i> Profil
                    <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="feat-show">
                    <li><a href="profile.php">
                            <i class="feather icon-user"></i>Profil Anda
                        </a></li>
                    <li><a href="changepassword.php"><i class="feather icon-lock"></i>Ganti Password</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="serv-btn"><i class="feather icon-activity"></i> Pemeriksaan
                    <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="serv-show">
                    <li><a href="appointment.php"><i class="feather icon-plus-circle"></i>Pendaftaran Pemeriksaan</a>
                    </li>
                    <li><a href="view-pending-appointment.php"><i class="feather icon-clock"></i>Menunggu
                            Persetujuan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="serv-btn"><i class="feather icon-list"></i> Riwayat Pemeriksaan
                    <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="serv-show">
                    <li><a href="tabelRK.php"><i class="feather icon-table"></i>Riwayat Kehamilan Anak</a></li>
                    <li><a href="tabelKS.php"><i class="feather icon-table"></i>Pemeriksaan Kehamilan</a></li>
                    <li><a href="tabelKU.php"><i class="feather icon-table"></i>Kunjungan Ulang</a></li>
                </ul>
            </li>


            <li>
                <a href="javascript:void(0);" onclick="confirmLogout()">
                    <i class="feather icon-log-out"></i> Logout
                </a>
            </li>

        </ul>
    </nav>

    <script>
        $(".btn").click(function() {
            $(this).toggleClass("click");
            $(".sidebar").toggleClass("show");
        });

        $(".feat-btn").click(function() {
            $("nav ul .feat-show").toggleClass("show");
            $("nav ul .first").toggleClass("rotate");
        });

        $(".serv-btn").click(function() {
            // Check profile completeness before allowing to navigate to appointment.php
            if (!<?php echo json_encode($profileComplete); ?>) {
                showProfileIncompleteAlert();
                return false; // Prevent navigation to appointment.php
            }
            $("nav ul .serv-show").toggleClass("show1");
            $("nav ul .second").toggleClass("rotate");
        });

        $("nav ul li").click(function() {
            $(this).addClass("active").siblings().removeClass("active");
        });

        // Initialize Feather Icons
        feather.replace();
    </script>

    <script>
        function showProfileIncompleteAlert() {
            Swal.fire({
                title: 'Peringatan',
                text: 'Lengkapi profil Anda terlebih dahulu!',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "profile.php"; // Redirect to profile.php on "Ok"
                }
            });
        }
    </script>
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

</body>

</html>