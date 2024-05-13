<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UKM Sanggar Seni Polibang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon_sanggar_seni.ico" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</head>

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
    $sql1 = "select * from bg_bidang where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = $r1['judul'];
    $foto = $r1['foto'];

    if ($judul == '' or $foto == '') {
      $error = "Data tidak ditemukan";
    }
  }

  if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];


    // $isi        = $_POST['isi'];
  
    if ($judul == '') {
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
  
        $foto_name = "bg_bidang" . time() . "_" . $foto_name;
        move_uploaded_file($foto_file, $direktori . "/" . $foto_name);

        $foto = $foto_name;
      } else {
        $foto_name = $foto; //memasukkan data dari data yang sebelumnya ada
      }

      if ($id != "") {
        $sql1 = "update bg_bidang set judul = '$judul', foto='$foto_name', tanggal=now() where id = '$id'";
      } else {
        $sql1 = "insert into  bg_bidang (judul,foto) values ('$judul','$foto_name')";
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
                <h1>Mengganti Background Bidang</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Background</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row">
                <div class="col-lg">
                    <div class="card pt-3">
                        <div class="card-body">
                            <h5 class="card-title">Form Mengganti Background Bidang</h5>
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
                                        <a href="bg_bidang.php">
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