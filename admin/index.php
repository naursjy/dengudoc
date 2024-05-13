<body>

    <!-- ======= Header ======= -->
    <?php
    include "templates/header2.php"
        ?>
    <!-- End Header -->

    <!-- ======= Navbar ======= -->
    <?php
    include "templates/navbar.php"
        ?>
    <!-- End Navbar -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <h1>Hi, Halo </h1>
            <h5>
                Selamat datang <b>
                    <?php echo $_SESSION['admin_username'] ?>
                </b> di halaman Admin <b>UKM Sanggar
                    Seni</b>.
            </h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Untuk mengubah tampilan user</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row-1">

                <!-- Left side columns -->
                <div class="col-lg">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-1 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Menu Tampilan user </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <a href="views/logo.php">
                                                <i class='bi bi-person'></i>
                                            </a>
                                        </div>
                                        <div class="ps-3">
                                            <div class="activity-content">
                                                Mengubah Logo, judul, Slide gambar, Tampilan Awal, Background dan Footer
                                            </div>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <div class="col-xxl-1 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Menu Divisi </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <a href="views/bidang_tari.php"><i class="bi bi-menu-button-wide"></i></a>
                                        </div>
                                        <div class="ps-3">
                                            <div class="activity-content">
                                                Mengubah Tampilan Divisi, Tari, Teater, Musik dan hadroh
                                            </div>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-1 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Menu Tentang Kami </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <a href="views/tentang_kami.php"><i class="bi bi-person-vcard"></i></a>
                                        </div>
                                        <div class="ps-3">
                                            <div class="activity-content">
                                                Mengubah Data Struktur Organisasi, Alamat, dan Sejarah singkat
                                            </div>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-1 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Menu Pendaftaran </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <a href="views/pendaftaran.php"><i class="bi bi-person-plus"></i></a>
                                        </div>
                                        <div class="ps-3">
                                            <div class="activity-content">
                                                Melihat Data Pendaftaran
                                            </div>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    include "templates/footer2.php"
        ?>
    <!-- End Footer -->