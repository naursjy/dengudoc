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
        $sql1 = "delete from sejarah where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil hapus data";
        }
    }
    ?>
    <!-- hapus Sturktur Organisasi -->
    <?php
    $suksess = "";
    $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "delete from alamat where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $suksess = "Berhasil hapus data";
        }
    }
    ?>
    <?php
    $suksesss = "";
    $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "select foto from tentang_kami where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        @unlink("../images/" . $r1['foto']);

        $sql1 = "delete from tentang_kami where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $suksesss = "Berhasil hapus data";
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
                <h1>Mengganti Struktur Organisasi</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Sejarah</h5>
                            <!-- <a href="sejarah_input.php">
                                <input type="button" class="btn btn-primary" value="Tambah Data" />
                            </a> -->

                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                            Tambah Data
                                        </button> -->

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Sejarah</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 0;
                                    $sql1 = "select * from sejarah";
                                    $q1 = mysqli_query($koneksi, $sql1);
                                    while ($r1 = mysqli_fetch_array($q1)) {
                                        $nomor++;

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo "$nomor"; ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['judul'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['sejarah'] ?>
                                            </td>
                                            <td><img src="../images/<?php echo sejarah_foto($r1['id']) ?>"
                                                    style="max-height:100px;max-width:100px" /></td>
                                            <td>
                                            <td>
                                                <a href="sejarah_input.php?id=<?php echo $r1['id'] ?>">
                                                    <span class="badge bg-warning text-dark">Edit</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div><!-- End Page Title -->
            <div class="row">
                <div class="col-lg">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel</h5>
                            <div class="mb-3">
                                <a href="tentang_kami_input.php">
                                    <input type="button" class="btn btn-primary" value="Tambah Data" />
                                </a>
                            </div>
                            <!-- <div class="search-bar">
                                <form class="search-form d-flex align-items-center" method="POST" action="#">
                                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                                </form>
                            </div> -->
                            <!-- End Search Bar -->
                            <?php
                            if ($suksesss) {
                                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    <?php echo $suksesss ?>
                                </div>
                                <?php
                            }
                            ?>
                            <form class="row g-3" method="get">
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Masukkan Kata Kunci"
                                        name="katakunci" value="<?php echo $katakunci ?>" />
                                </div>
                                <div class="col-auto">
                                    <input type="submit" name="cari" value="Cari Anggota" class="btn btn-success" />
                                </div>
                            </form>
                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Moto</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../inc/inc_koneksi.php";

                                    $sqltambahan = "";
                                    $per_halaman = 5;
                                    if ($katakunci != '') {
                                        $array_katakunci = explode(" ", $katakunci);
                                        for ($x = 0; $x < count($array_katakunci); $x++) {
                                            $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or nim like '%" . $array_katakunci[$x] . "%')";
                                        }
                                        $sqltambahan = " where " . implode(" or ", $sqlcari);
                                    }
                                    $sql1 = "select * from tentang_kami $sqltambahan";
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
                                            <td><img src="../images/<?php echo anggota_foto($r1['id']) ?>"
                                                    style="max-height:100px;max-width:100px" />
                                            </td>
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
                                                <?php echo $r1['jabatan'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['motto'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['ig'] ?>
                                            </td>
                                            <td>
                                                <a href="tentang_kami_input.php?id=<?php echo $r1['id'] ?>">
                                                    <span class="badge bg-warning text-dark">Edit</span>
                                                </a>

                                                <a href="tentang_kami.php?op=delete&id=<?php echo $r1['id'] ?>"
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
                                                href="tentang_kami.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
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
            <div class="row">
                <div class="col-lg">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Alamat</h5>
                            <!-- <a href="alamat_input.php">
                                <input type="button" class="btn btn-primary" value="Tambah Data" />
                            </a> -->

                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                            Tambah Data
                                        </button> -->

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telp/ WA</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 0;
                                    $sql1 = "select * from alamat";
                                    $q1 = mysqli_query($koneksi, $sql1);
                                    while ($r1 = mysqli_fetch_array($q1)) {
                                        $nomor++;

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo "$nomor"; ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['alamat'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['email'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['telpon'] ?>
                                            </td>
                                            <td>
                                                <a href="alamat_input.php?id=<?php echo $r1['id'] ?>">
                                                    <span class="badge bg-warning text-dark">Edit</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

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