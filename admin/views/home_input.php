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

    <!-- slide show -->
    <?php
    $judul = "";
    $deskripsi = "";

    $foto = "";
    $foto_name = "";





    $error = "";
    $sukses = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = "";
    }

    if ($id != "") {
        $sql1 = "select * from home where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        $judul = $r1['judul'];
        $deskripsi = $r1['deskripsi'];
        $foto = $r1['foto'];

        if ($judul == '' or $deskripsi == '' or $foto == '') {
            $error = "Data tidak ditemukan";
        }
    }

    if (isset($_POST['simpan'])) {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];


        // $isi        = $_POST['isi'];
    
        if ($judul == '' or $deskripsi == '') {
            $error = "Silakan masukkan semua data.";
        }
        //Array ( [foto] => Array ( [name] => Budi Rahardjo.jpg [type] => image/jpeg [tmp_name] => C:\xampp2\tmp\php4FDD.tmp [error] => 0 [size] => 2375701 ) )
        // print_r($_FILES);
        if ($_FILES['foto']['name']) {
            $foto_name = $_FILES['foto']['name'];
            $foto_file = $_FILES['foto']['tmp_name'];

            $detail_file = pathinfo($foto_name);
            $foto_ekstensi = $detail_file['extension'];
            // Array ( [dirname] => . [basename] => Romi Satrio Wahono.jpg [extension] => jpg [filename] => Romi Satrio Wahono )
            $ekstensi_yang_diperbolehkan = array("jpg", "jpeg", "png", "gif", "JPG");
            if (!in_array($foto_ekstensi, $ekstensi_yang_diperbolehkan)) {
                $error = "Ekstensi yang diperbolehkan adalah jpg, jpeg, png, JPG dan gif";
            }

        }


        if (empty($error)) {
            if ($foto_name) {
                $direktori = "../images/";

                @unlink($direktori . "/$foto"); //delete data
    
                $foto_name = "slide_show" . time() . "_" . $foto_name;
                move_uploaded_file($foto_file, $direktori . "/" . $foto_name);

                $foto = $foto_name;
            } else {
                $foto_name = $foto; //memasukkan data dari data yang sebelumnya ada
            }

            if ($id != "") {
                $sql1 = "update home set judul = '$judul',deskripsi='$deskripsi', foto='$foto_name' where id = '$id'";
            } else {
                $sql1 = "insert into  home (judul,deskripsi,foto) values ('$judul','$deskripsi','$foto_name')";
            }

            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Sukses memasukkan data";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    }


    ?>

    <!-- ======= Sidebar ======= -->

    <?php
    include "../templates/navbar1.php"
        ?>
    <!-- End Navbar -->


    <main id="main" class="main">
        <section class="section">
            <div class="pagetitle">
                <h1>Mengganti Tampilan Home</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row">
                <div class="col-lg">
                    <div class="card pt-3">
                        <div class="card-body">
                            <h5 class="card-title">Form Mengganti Tampilan Home</h5>
                            <?php
                            if ($error) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error ?>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($sukses) {
                                ?>
                                <div class="alert alert-primary" role="alert">
                                    <?php echo $sukses ?>
                                </div>
                                <?php
                            }
                            ?>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul" value="<?php echo $judul ?>"
                                            name="judul">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10" id="summernote">
                                        <textarea name="deskripsi" id="deskripsi" class="form-control"
                                            id="summernote"><?php echo $deskripsi ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <?php
                                        if ($foto) {
                                            echo "<img src='../images/$foto' style='max-height:100px;max-width:100px'/>";
                                        }
                                        ?>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                                    <div class="col-sm-10">
                                        <input type="submit" name="simpan" value="Simpan Data"
                                            class="btn btn-primary" />
                                        <a href="home.php">
                                            <input type="button" class="btn btn-success" value="Kembali" />
                                        </a>
                                        <!-- <button type="submit" class="btn btn-primary">Submit Form</button> -->
                                    </div>
                                </div>

                            </form>
                            <!-- Table with stripped rows -->


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