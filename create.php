<?php

session_start();

require_once "./controller.php";

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

// mengecek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  
  // cek apakah data berhasil ditambahkan atau tidak
  if (create($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil ditambah!')
      document.location.href = 'home.php'
    </script>";
  } else {
    echo "
    <div class='container mt-2'>
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        gagal menambah data!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
    </div>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- style -->
    <style>
      .addform {
        max-width: 550px;
        padding: 16px 48px;
      }

      @media screen and (max-width: 576px) {
        .addform {
          width: 100%;
          padding: 16px 24px;
        }
      }
    </style>

    <title>Form Tambah Data</title>
  </head>
  <body>
    <?php include('navbar.php') ?>
    <div class="container pt-4 mt-4">
      <div class="mx-auto mb-5 mt-2 addform border rounded">
        <h2 class="pb-3 my-4 text-center">Tambah Data Penumpang</h2>

        <form action="" method="POST">
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" name="tanggal_lahir" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Pria" required>
                <label class="form-check-label" for="jk_pria">
                  Pria
                </label>
              </div>
              <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Wanita" required>
                <label class="form-check-label" for="jk_wanita">
                  Wanita
                </label>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="asal" class="col-sm-3 col-form-label">Kota Asal</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="asal" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="tujuan" required>
            </div>
          </div>
          <div class="row mb-4">
            <label for="maskapai" class="col-sm-3 col-form-label">Maskapai</label>
            <div class="col-sm-9">
              <select class="form-select" aria-label="Default select example" name="maskapai" required>
                <option disabled selected>--Pilih--</option>
                <option value="Batik Air">Batik Air</option>
                <option value="Citilink">Citilink</option>
                <option value="Garuda Indonesia">Garuda Indonesia</option>
                <option value="Indonesia Air Asia">Indonesia Air Asia</option>
                <option value="Lion Air">Lion Air</option>
                <option value="NAM Air">NAM Air</option>
                <option value="Sriwijaya Air">Sriwijaya Air</option>
                <option value="Super Air Jet">Super Air Jet</option>
                <option value="Wings Air">Wings Air</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <button type="reset" class="btn btn-secondary w-100 mb-2">Reset</button>
            </div>
            <div class="col-sm-9">
              <button type="submit" name="submit" class="btn btn-primary w-100">Simpan Data</button>
            </div>
          </div>
        </form>
      </div>
      <?php include('footer.php'); ?>
  </body>
</html>