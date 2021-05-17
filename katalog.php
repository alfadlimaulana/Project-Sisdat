<?php  

session_start();

if(!isset($_SESSION["Login_Anggota"])){

  echo "<script>
            alert('Login Terlebih Dahulu!');
            document.location.href = 'login-anggota.php';
        </script>";
  exit;
}

require 'functions.php';
$books = query("SELECT * FROM buku");

//tombol cari ditekan
if(isset($_POST["cari"])){
  $books = cari($_POST["kata_kunci"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />

    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&family=PT+Serif&family=Proza+Libre&display=swap" rel="stylesheet" />

    <title>PJJ</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu-anggota.php">PJJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="katalog.php">Katalog</a>
            <a class="nav-link" href="pinjam.php">Pinjam</a>
            <a class="nav-link" href="kembalikan.php">Kembalikan</a>
            <a class="nav-link" href="logout.php">Keluar</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid small-jumbotron">
      <div class="container menu-title">
        <h2 class="display-4">KATALOG</h2>
      </div>
    </div>
    <!-- akhir jumbotron -->

    <!-- table -->
    <div class="container-fluid tabel-katalog overflow-auto" >
      <!-- cari -->
      <form action="" method="post">
        <div class="row justify-content-end">
          <div class="col-auto">
            <label for="searchBuku" class="visually-hidden">Password</label>
            <input type="text" class="form-control" id="searchBuku" placeholder="Masukkan kata kunci" name="kata_kunci" autofocus/>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" name="cari">Cari</button>
          </div>
        </div>
      </form>
      <!--akhir cari -->

      <table class="table table-dark" id="dtBasicExample">
        <thead>
          <tr>
            <th scope="col">Gambar</th>
            <th scope="col">Kode</th>
            <th scope="col">Judul</th>
            <th scope="col">Penulis</th>
            <th scope="col">Tahun Terbit</th>
          </tr>
        </thead>
        <tbody>

          <?php  foreach($books as $book): ?>
          <?php $kode = $book["Kode_Buku"]; ?>  
          <tr>
            <td><img src="img/Buku/<?= $book["Gambar"]; ?>" width="100"></td>
            <th scope="row"><?= $book["Kode_Buku"]; ?></th>
            <td><?= $book["Judul"]; ?></td>
            <td><?= $book["Penulis"]; ?></td>
            <td><?= $book["Tahun_Terbit"]; ?></td>
          </tr>
          <?php  endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- akhir table -->

    <!-- footer -->
    <footer class="landing">
      <div class="container-fluid container-footer">
        <div class="row footer">
          <div class="col text-center">
            <p>2021. All Rights Reserved by Kelompok 2 Sisdat Kelas A</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="index.js"></script>
  </body>
</html>
