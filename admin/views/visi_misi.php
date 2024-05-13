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
    <!-- hapus judul -->
    <?php
    $sukses1 = "";
    $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "delete from judul where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses1 = "Berhasil hapus data";
        }
    }
    ?>

    <!-- End Header -->


    <?php
    include "../templates/navbar1.php"
        ?>
    <!-- End Navbar -->


    <main id="main" class="main">
        <section class="section">
            <div class="pagetitle">
                <h1>Mengganti Judul</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row">
                <div class="col-lg">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Visi-Misi</h5>
                            <a href="visi_misi_input.php">
                                <input type="button" class="btn btn-primary" value="Tambah Data" />
                            </a>
                            <?php
                            if ($sukses1) {
                                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    <?php echo $sukses1 ?>
                                </div>
                                <?php
                            }
                            ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">Visi</th>
                                        <th scope="col">Misi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqltambahan = "";
                                    $per_halaman = 3;
                                    if ($katakunci != '') {
                                        $array_katakunci = explode(" ", $katakunci);
                                        for ($x = 0; $x < count($array_katakunci); $x++) {
                                            $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or isi like '%" . $array_katakunci[$x] . "%')";
                                        }
                                        $sqltambahan = " where " . implode(" or ", $sqlcari);
                                    }
                                    $sql1 = "select * from visi_misi $sqltambahan";
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
                                            <td>

                                                <?php echo $r1['visi'] ?>
                                            </td>
                                            <td>

                                                <?php echo $r1['misi'] ?>
                                            </td>
                                            <td>
                                                <a href="visi_misi_input.php?id=<?php echo $r1['id'] ?>">
                                                    <span class="badge bg-warning text-dark">Edit</span>
                                                </a>
                                                <a href="visi_misi.php?op=delete&id=<?php echo $r1['id'] ?>"
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