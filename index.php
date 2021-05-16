<?php  
require 'functions.php';
$books = query("SELECT * FROM buku");
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
        <a class="navbar-brand" href="menu-anggota.html">PJJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="katalog.html">Katalog</a>
            <a class="nav-link" href="order.html">Order</a>
            <a class="nav-link" href="tambah.php">Tambah Buku</a>
            <a class="nav-link" href="index.php">Kelola Buku</a>
            <a class="nav-link" href="landing.html">Keluar</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid small-jumbotron">
      <div class="container menu-title">
        <h2 class="display-4">INDEX BUKU</h2>
      </div>
    </div>
    <!-- akhir jumbotron -->

    <!-- table -->
    <div class="container-fluid tabel-katalog overflow-auto" >
      <table class="table table-dark" id="dtBasicExample">
        <thead>
          <tr>
            <th scope="col">Gambar</th>
            <th scope="col">Kode</th>
            <th scope="col">Judul</th>
            <th scope="col">Penulis</th>
            <th scope="col">Tahun Terbit</th>
            <th scope="col">Aksi</th>
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
            <td>
              <a href="ubah.php?Kode_Buku=<?= $book["Kode_Buku"]; ?>" onclick="return confirm('Ubah Buku dengan Kode <?= $kode ?> ?')">Ubah</a> | 
              <a href="hapus.php?Kode_Buku=<?= $book["Kode_Buku"]; ?>" onclick="return confirm('Hapus Buku dengan Kode <?= $kode ?> ?')">Hapus</a>
            </td>
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
            <p>2021. All Rights Reserved by Kelompok 2</p>
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
