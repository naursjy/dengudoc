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
        $sql1 = "select foto from tb_footer where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        @unlink("../images/" . $r1['foto']);

        $sql1 = "delete from tb_footer where id = '$id'";
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
                            <h5 class="card-title">Tabel Sosial Media</h5>
                            <a href="edit_footer_input.php">
                                <input type="button" class="btn btn-primary" value="Tambah Data" />
                            </a>
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

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">WhatsApp</th>
                                        <th scope="col">Tik Tok</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col">Copyright</th>
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
                                            $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or isi like '%" . $array_katakunci[$x] . "%')";
                                        }
                                        $sqltambahan = " where " . implode(" or ", $sqlcari);
                                    }
                                    $sql1 = "select * from tb_footer $sqltambahan";
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
                                                <?php echo $r1['wa'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['fb'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['ig'] ?>
                                            </td>
                                            <td>
                                                <?php echo $r1['copyright'] ?>
                                            </td>
                                            <td>
                                                <a href="edit_footer_input.php?id=<?php echo $r1['id'] ?>">
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