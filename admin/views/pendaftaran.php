<body>
    <!-- ======= Header ======= -->
    <?php
    include "../templates/header.php"
        ?>

    <?php
    include "../../inc/inc_fungsi.php"
        ?>

    <?php
    include "../../inc/inc_koneksi.php"
        ?>

    <!-- hapus slide -->
    <?php
    $sukses = "";
    $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "select foto from pendaftaran where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        @unlink("../images/" . $r1['foto']);

        $sql1 = "delete from tutors where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil hapus data";
        }
    }
    ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->

    <?php
    include "../templates/navbar1.php"
        ?>
    <!-- End Navbar -->


    <main id="main" class="main">
        <section class="section">
            <div class="pagetitle">
                <h1>Data Pendaftaran</h1>
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
                            <h5 class="card-title">Tabel Pendaftaran</h5>
                            <?php
                            if ($sukses) {
                                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    <?php echo $sukses ?>
                                </div>
                                <?php
                            }
                            ?>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                            Tambah Data
                                        </button> -->
                            <form class="row g-3" method="get">
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Masukkan Kata Kunci"
                                        name="katakunci" value="<?php echo $katakunci ?>" />
                                </div>
                                <div class="col-auto">
                                    <input type="submit" name="cari" value="Cari Anggota" class="btn btn-success" />
                                </div>
                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No. </th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Prodi</th>
                                            <!-- <th scope="col">Tahun masuk</th> -->
                                            <th scope="col">Tempat, Tanggal lahir</th>
                                            <th scope="col">No. Telp/WA</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Seni Yang Diminati</th>
                                            <th scope="col">Motivasi</th>
                                            <th scope="col">Pertanyaan</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqltambahan = "";
                                        $per_halaman = 5;
                                        if ($katakunci != '') {
                                            $array_katakunci = explode(" ", $katakunci);
                                            for ($x = 0; $x < count($array_katakunci); $x++) {
                                                $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or nim like '%" . $array_katakunci[$x] . "%')";
                                            }
                                            $sqltambahan = " where " . implode(" or ", $sqlcari);
                                        }
                                        $sql1 = "select * from pendaftaran $sqltambahan";
                                        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                        $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                                        $q1 = mysqli_query($koneksi, $sql1);
                                        $total = mysqli_num_rows($q1);
                                        $pages = ceil($total / $per_halaman);
                                        $nomor = $mulai + 1;
                                        $sql1 = $sql1 . " order by id desc limit $mulai,$per_halaman";

                                        $q1 = mysqli_query($koneksi, $sql1);

                                        while ($r1 = mysqli_fetch_array($q1)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $nomor++ ?>
                                                </td>
                                                <td><img src="../../assets/gambar_pendaftar/<?php echo foto_pendaftaran($r1['id']) ?>"
                                                        style="max-height:100px;max-width:100px" /></td>
                                                <td>
                                                    <?php echo $r1['nama'] ?>
                                                </td>

                                                <td>
                                                    <?php echo $r1['nim'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r1['prodi'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r1['tahun_masuk'] ?>,
                                                    <?php echo $r1['ttl'] ?>
                                                </td>

                                                <td>
                                                    <?php echo $r1['telpon'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r1['email'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r1['seni'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r1['minat_motivasi'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r1['pertanyaan'] ?>
                                                </td>
                                                <td>

                                                    <a href="pendaftaran.php?op=delete&id=<?php echo $r1['id'] ?>"
                                                        onclick="return confirm('Apakah yakin mau hapus data ?')">
                                                        <span class="badge bg-danger">Hapus</span>
                                                    </a>


                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php
                                        $cari = isset($_GET['cari']) ? $_GET['cari'] : "";

                                        for ($i = 1; $i <= $pages; $i++) {
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="pendaftaran.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </nav>
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