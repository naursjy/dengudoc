<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/js/main.js" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar ">

        <ul class="sidebar-nav " id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Tampilan User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../admin/views/logo.php">
                            <i class="bi bi-circle"></i><span>Mengganti Logo</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/judul.php">
                            <i class="bi bi-circle"></i><span>Mengganti Judul</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/judul_slide.php">
                            <i class="bi bi-circle"></i><span>Mengganti Slide Gambar</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/home.php">
                            <i class="bi bi-circle"></i><span>Mengganti Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/visi_misi.php">
                            <i class="bi bi-circle"></i><span>Mengganti Visi-Misi</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/bg_bidang.php">
                            <i class="bi bi-circle"></i><span>Mengganti Background</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/edit_footer.php">
                            <i class="bi bi-circle"></i><span>Mengganti Footer</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Profile Page Nav -->
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Divisi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../admin/views/bidang_tari.php">
                            <i class="bi bi-circle"></i><span>Tari</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/bidang_teater.php">
                            <i class="bi bi-circle"></i><span>Teater</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/bidang_musik.php">
                            <i class="bi bi-circle"></i><span>Musik</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/views/bidang_hadroh.php">
                            <i class="bi bi-circle"></i><span>hadroh</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/views/tentang_kami.php">
                    <i class="bi bi-person-vcard"></i>
                    <span>Tentang Kami</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/views/ganti_password.php">
                    <i class='bx bxs-user-detail'></i>
                    <span>Mengganti Password</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/views/pendaftaran.php">
                    <i class="bi bi-person-plus"></i>
                    <span>Pendaftaran</span>
                </a>
            </li><!-- End Contact Page Nav -->




        </ul>

    </aside><!-- End Sidebar-->
</body>