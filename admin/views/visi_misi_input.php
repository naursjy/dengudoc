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
    <!-- End Header -->

    <!-- judul -->
    <?php
    $visi = "";
    $misi = "";


    $error1 = "";
    $sukses1 = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = "";
    }

    if ($id != "") {
        $sql1 = "select * from visi_misi where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        $visi = $r1['visi'];
        $misi = $r1['misi'];



        if ($visi == '' or $misi == '') {
            $error1 = "Data tidak ditemukan";
        }
    }

    if (isset($_POST['simpan_visi_misi'])) {
        $visi = $_POST['visi'];
        $misi = $_POST['misi'];
        // $isi        = $_POST['isi'];
    
        if ($visi == '' or $misi == '') {
            $error1 = "Silakan masukkan data.";
        }
        //Array ( [foto] => Array ( [name] => Budi Rahardjo.jpg [type] => image/jpeg [tmp_name] => C:\xampp2\tmp\php4FDD.tmp [error] => 0 [size] => 2375701 ) )
        // print_r($_FILES);
    


        if (empty($error1)) {

            if ($id != "") {
                $sql1 = "update visi_misi set visi = '$visi', misi='$misi' where id = '$id'";
            } else {
                $sql1 = "insert into  visi_misi (visi,misi) values ('$visi','$misi')";
            }

            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses1 = "Sukses memasukkan data";
            } else {
                $error1 = "Gagal cuy masukkan data";
            }
        }
    }


    ?>

    <!-- slide show -->


    <?php
    include "../templates/navbar1.php"
        ?>
    <!-- End Navbar -->


    <main id="main" class="main">
        <section class="section">
            <div class="pagetitle">
                <h1>Mengganti Visi Misi</h1>
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
                            <h5 class="card-title">Form Mengganti Visi Misi</h5>
                            <?php
                            if ($error1) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error1 ?>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($sukses1) {
                                ?>
                                <div class="alert alert-primary" role="alert">
                                    <?php echo $sukses1 ?>
                                </div>
                                <?php
                            }
                            ?>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Visi</label>
                                    <div class="col-sm-10">
                                        <textarea name="visi" id="visi" class="form-control"
                                            id="summernote"><?php echo $visi ?></textarea>

                                        <!-- <input type="text" class="form-control" id="visi" value="" name="visi"> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Misi</label>
                                    <div class="col-sm-10">
                                        <textarea name="misi" id="misi"
                                            class="form-control"><?php echo $misi ?></textarea>

                                        <!-- <input type="text" class="form-control" id="misi" value="" name="misi"> -->
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                                    <div class="col-sm-10">
                                        <input type="submit" name="simpan_visi_misi" id="nama" value="Simpan Data"
                                            class="btn btn-primary" />
                                        <a href="visi_misi.php">
                                            <input type="button" class="btn btn-success" value="Kembali" />
                                        </a>
                                        <!-- <button type="submit" class="btn btn-primary">Submit Form</button> -->
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->
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