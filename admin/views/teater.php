<body>
    <!-- ======= Header ======= -->
    <?php
    include "../templates/header.php"
        ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar ">

        <ul class="sidebar-nav " id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="../index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Bidang</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tari.php">
                            <i class="bi bi-circle"></i><span>Tari</span>
                        </a>
                    </li>
                    <li>
                        <a href="musik.php">
                            <i class="bi bi-circle"></i><span>Musik</span>
                        </a>
                    </li>
                    <li>
                        <a href="teater.php">
                            <i class="bi bi-circle"></i><span>Teater</span>
                        </a>
                    </li>
                    <li>
                        <a href="hadroh.php">
                            <i class="bi bi-circle"></i><span>hadroh</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="tentang_kami.php">
                    <i class="bi bi-person"></i>
                    <span>Tentang Kami</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="dokumentasi.php">
                    <i class="bi bi-camera"></i>
                    <span>Dokumentasi</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pendaftaran.php">
                    <i class="bi bi-person-plus"></i>
                    <span>Pendaftaran</span>
                </a>
            </li><!-- End Contact Page Nav -->




        </ul>

    </aside><!-- End Sidebar-->
    <?php
    //include "../templates/navbar.php"
//?>
    <!-- End Navbar -->


    <main id="main" class="main">
        <section class="section">
            <div class="pagetitle">
                <h1>Data Anggota Teater</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row">
                <div class="col-lg">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Anggota Teater</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#basicModaltambah">
                                Tambah Data
                            </button>
                            <div class="modal fade" id="basicModaltambah" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Menambah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <!-- No Labels Form -->
                                        <form class="row g-3 p-3">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" placeholder="Nama">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="email" class="form-control" placeholder="Prodi">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control" placeholder="Angkatan">
                                            </div>
                                            <div class="col-12">
                                                <input type="text" class="form-control" placeholder="Address">
                                            </div>
                                            <div class="col-md-4">
                                                <select id="inputState" class="form-select">
                                                    <option selected>Foto...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" placeholder="Zip">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form><!-- End No Labels Form -->
                                    </div>
                                </div>
                            </div><!-- End Basic Modal-->
                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Brandon Jacob</td>
                                        <td>Designer</td>
                                        <td>28</td>
                                        <td>2016-05-25</td>
                                        <td><button type="button" class="btn btn-danger">Hapus</button>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="basicModal" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Mengganti Format ketua</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- No Labels Form -->
                                                        <form class="row g-3 p-3">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="email" class="form-control"
                                                                    placeholder="Prodi">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="password" class="form-control"
                                                                    placeholder="Angkatan">
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Address">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select id="inputState" class="form-select">
                                                                    <option selected>Foto...</option>
                                                                    <option>...</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Zip">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="button"
                                                                    class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </form><!-- End No Labels Form -->
                                                    </div>
                                                </div>
                                            </div><!-- End Basic Modal-->
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ======= Footer ======= -->
    <?php
    include "../templates/footer.php"
        ?>
    <!-- End Footer -->