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
  $wa = "";
  $fb = "";
  $ig = "";
  $cr = "";

  $error1 = "";
  $sukses1 = "";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = "";
  }

  if ($id != "") {
    $sql1 = "select * from tb_footer where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $wa = $r1['wa'];
    $fb = $r1['fb'];
    $ig = $r1['ig'];
    $cr = $r1['copyright'];

    if ($wa == '' or $fb == '' or $ig == '' or $cr == '') {
      $error1 = "Data tidak ditemukan";
    }
  }

  if (isset($_POST['simpan'])) {
    $wa = $_POST['wa'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $cr = $_POST['copyright'];

    // $isi        = $_POST['isi'];
  
    if ($wa == '' or $fb == '' or $ig == '' or $cr == '') {
      $error1 = "Silakan masukkan data.";
    }
    //Array ( [foto] => Array ( [name] => Budi Rahardjo.jpg [type] => image/jpeg [tmp_name] => C:\xampp2\tmp\php4FDD.tmp [error] => 0 [size] => 2375701 ) )
    // print_r($_FILES);
  


    if (empty($error1)) {

      if ($id != "") {
        $sql1 = "update tb_footer set wa = '$wa',fb='$fb',ig='$ig',copyright='$cr', tanggal=now() where id = '$id'";
      } else {
        $sql1 = "insert into tb_footer (wa,fb,ig,copyright) values ('$wa','$fb','$ig','$cr')";
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
                <h1>Mengganti Footer</h1>
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
                            <h5 class="card-title">Form Mengganti Footer</h5>
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
                                    <label for="inputText" class="col-sm-2 col-form-label">What Apps</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="wa" value="<?php echo $wa ?>"
                                            name="wa">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tik Tok</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tb" value="<?php echo $fb ?>"
                                            name="fb">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ig" value="<?php echo $ig ?>"
                                            name="ig">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Copyright</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="copyright" value="<?php echo $cr ?>"
                                            name="copyright">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                                    <div class="col-sm-10">
                                        <input type="submit" name="simpan" id="nama" value="Simpan Data"
                                            class="btn btn-primary" />
                                        <a href="edit_footer.php">
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