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
  $alamat = "";
  $email = "";
  $telpon = "";

  $error1 = "";
  $sukses1 = "";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = "";
  }

  if ($id != "") {
    $sql1 = "select * from alamat where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = $r1['judul'];


    if ($alamat == '' or $email == '' or $telpon == '') {
      $error1 = "Data tidak ditemukan";
    }
  }

  if (isset($_POST['simpan'])) {
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    // $isi        = $_POST['isi'];
  
    if ($alamat == '' or $email == '' or $telpon == '') {
      $error1 = "Silakan masukkan data.";
    }
    //Array ( [foto] => Array ( [name] => Budi Rahardjo.jpg [type] => image/jpeg [tmp_name] => C:\xampp2\tmp\php4FDD.tmp [error] => 0 [size] => 2375701 ) )
    // print_r($_FILES);
  


    if (empty($error1)) {

      if ($id != "") {
        $sql1 = "update alamat set alamat = '$alamat',email='$email',telpon='$telpon', tanggal=now() where id = '$id'";
      } else {
        $sql1 = "insert into alamat (alamat,email,telpon) values ('$alamat','$email','$telpon')";
      }

      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses1 = "Sukses memasukkan data";
      } else {
        $error1 = "Gagal masukkan data";
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
        <h1>Mengganti Alamat</h1>
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
              <h5 class="card-title">Form Mengganti Alamat</h5>
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
                  <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" value="<?php echo $alamat ?>" name="alamat">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" value="<?php echo $email ?>" name="email">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Telp/ WA</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telpon" value="<?php echo $telpon ?>" name="telpon">
                  </div>
                </div>

                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-10">
                    <input type="submit" name="simpan" id="nama" value="Simpan Data" class="btn btn-primary" />
                    <a href="tentang_kami.php">
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
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>