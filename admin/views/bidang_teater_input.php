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
  $deskripsi_pendek = "";
  $tanggal = "";
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
    $sql1 = "select * from konten_teater where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = $r1['judul'];
    $deskripsi_pendek = $r1['deskripsi_pendek'];
    $deskripsi = $r1['deskripsi'];
    $tanggal = $r1['tanggal'];
    $foto = $r1['foto'];

    if ($judul == '' or $deskripsi_pendek == '' or $deskripsi == '' or $foto == '' or $tanggal == '') {
      $error = "Data tidak ditemukan";
    }
  }

  if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $deskripsi_pendek = $_POST['deskripsi_pendek'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];


    // $isi        = $_POST['isi'];
  
    if ($judul == '' or $deskripsi_pendek == '' or $deskripsi == '' or $tanggal == '') {
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
      $ekstensi_yang_diperbolehkan = array("jpg", "jpeg", "png", "gif", "JPG", "webp");
      if (!in_array($foto_ekstensi, $ekstensi_yang_diperbolehkan)) {
        $error = "Ekstensi yang diperbolehkan adalah jpg, jpeg, png, JPG, webp dan gif";
      }

    }


    if (empty($error)) {
      if ($foto_name) {
        $direktori = "../images/";

        @unlink($direktori . "/$foto"); //delete data
  
        $foto_name = "bidang_teater_" . time() . "_" . $foto_name;
        move_uploaded_file($foto_file, $direktori . "/" . $foto_name);

        $foto = $foto_name;
      } else {
        $foto_name = $foto; //memasukkan data dari data yang sebelumnya ada
      }

      if ($id != "") {
        $sql1 = "update konten_teater set judul = '$judul', tanggal='$tanggal', deskripsi_pendek='$deskripsi_pendek',deskripsi='$deskripsi', foto='$foto_name' where id = '$id'";
      } else {
        $sql1 = "insert into  konten_teater (judul,tanggal,deskripsi_pendek,deskripsi,foto) values ('$judul','$tanggal','$deskripsi_pendek','$deskripsi','$foto_name')";
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
                <h1>Mengganti Konten Teater</h1>
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
                            <h5 class="card-title">Form Mengganti Tampilan Konten Teater</h5>
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
                                <div class="row mb-3">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal"
                                            value="<?php echo $tanggal ?>" name="tanggal">
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
                                    <label for="nim" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="deskripsi_pendek"
                                            value="<?php echo $deskripsi_pendek ?>" name="deskripsi_pendek">
                                    </div>
                                    <label for="nim" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea name="deskripsi" class="form-control"
                                            id="summernote"><?php echo $deskripsi ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                                    <div class="col-sm-10">
                                        <input type="submit" name="simpan" value="Simpan Data"
                                            class="btn btn-primary" />
                                        <a href="bidang_teater.php">
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