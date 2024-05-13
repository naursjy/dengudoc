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
  $nama = "";
  $nim = "";
  $prodi = "";



  // $isi        = "";
  $foto = "";
  $foto_name = "";
  $jabatan = "";
  $motto = "";
  $ig = "";




  $error = "";
  $sukses = "";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = "";
  }

  if ($id != "") {
    $sql1 = "select * from tentang_kami where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $nim = $r1['nim'];
    $prodi = $r1['prodi'];
    $foto = $r1['foto'];
    $jabatan = $r1['jabatan'];
    $motto = $r1['motto'];
    $ig = $r1['ig'];


    if ($nama == '' or $nim == '' or $prodi == '' or $foto == '' or $jabatan == '' or $motto == '' or $ig == '') {
      $error = "Data tidak ditemukan";
    }
  }

  if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $jabatan = $_POST['jabatan'];
    $motto = $_POST['motto'];
    $ig = $_POST['ig'];

    // $isi        = $_POST['isi'];
  
    if ($nama == '' or $nim == '' or $prodi == '' or $jabatan == '' or $motto == '' or $ig == '') {
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
        $sql1 = "update tentang_kami set nama = '$nama',nim='$nim',prodi='$prodi',foto='$foto_name', jabatan = '$jabatan', motto='$motto', ig='$ig' where id = '$id'";
      } else {
        $sql1 = "insert into  tentang_kami (nama,nim,prodi,foto,jabatan,motto,ig) values ('$nama','$nim','$prodi','$foto_name','$jabatan','$motto','$ig')";
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
                <h1>Mengganti Struktur Organisasi</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row">
                <div class="col-lg">
                    <div class="card pt-3">
                        <div class="card-body">
                            <h5 class="card-title">Form Mengganti Struktur Organisasi</h5>
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
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>"
                                            name="nama">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nim" value="<?php echo $nim ?>"
                                            name="nim">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prodi" value="<?php echo $prodi ?>"
                                            name="prodi">
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
                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jabatan"
                                            value="<?php echo $jabatan ?>" name="jabatan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="motto" class="col-sm-2 col-form-label">Motto</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="motto" value="<?php echo $motto ?>"
                                            name="motto">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ig" value="<?php echo $ig ?>"
                                            name="ig">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                                    <div class="col-sm-10">
                                        <input type="submit" name="simpan" value="Simpan Data"
                                            class="btn btn-primary" />
                                        <a href="tentang_kami.php">
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