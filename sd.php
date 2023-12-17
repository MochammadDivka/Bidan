<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    <link rel="stylesheet" href="sd.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- Include Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>

<body>
    <div class="btn">
        <i data-feather="menu"></i>
    </div>

    <nav class="sidebar">
        <div class="text">XieMedical</div>
        <div class="close-btn">
            <i data-feather="x" class="close-icon"></i>
        </div>
        <ul>
            <li class="active"><a href="index.php"><i data-feather="home"></i> Home</a></li>
            <li>
                <a href="#" class="feat-btn"><i data-feather="user"></i> Profil
                    <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="feat-show">
                    <li><a href="profile.php">Profil Anda</a></li>
                    <li><a href="changepassword.php">Ganti Password</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="serv-btn"><i data-feather="activity"></i> Pemeriksaan
                    <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="serv-show">
                    <li><a href="#">Pendaftaran Pemeriksaan</a></li>
                    <li><a href="#">Menunggu Persetujuan</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="serv-btn"><i data-feather="clock"></i> Riwayat Pemeriksaan
                    <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="serv-show">
                    <li><a href="tabelRK.php">Riwayat Kehamilan Anak</a></li>
                    <li><a href="tabelKS.php">Pemeriksaan Kehamilan</a></li>
                    <li><a href="tabelKU.php">Pemeriksaan Kehamilan</a></li>
                </ul>
            </li>

            <li><a href="logout.php"><i data-feather="log-out"></i> Logout</a></li>
        </ul>
    </nav>

    <script>
    $(".btn").click(function() {
        $(this).toggleClass("click");
        $(".sidebar").toggleClass("show");
    });

    // Close button functionality
    $(".close-btn").click(function() {
        $(".btn").removeClass("click");
        $(".sidebar").removeClass("show");
    });

    $(".feat-btn").click(function() {
        $("nav ul .feat-show").toggleClass("show");
        $("nav ul .first").toggleClass("rotate");
    });

    $(".serv-btn").click(function() {
        $("nav ul .serv-show").toggleClass("show1");
        $("nav ul .second").toggleClass("rotate");
    });

    $("nav ul li").click(function() {
        $(this).addClass("active").siblings().removeClass("active");
    });

    // Initialize Feather Icons
    feather.replace();
    </script>
</body>

</html>