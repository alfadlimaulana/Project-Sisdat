<?php 

require 'functions.php'; 

if(isset($_POST["Daftar_Anggota"])){
  if(daftar_anggota($_POST) > 0){
    echo "<script>
            alert('Anggota baru BERHASIL terdaftar!');
          </script>";
  }else{
    echo "<script>
            alert('Anggota baru GAGAL terdaftar!');
          </script>";
  }
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
    <div class="container-fluid container-navbar login-navbar">
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="landing.html">PJJ</a>
      </nav>
    </div>
    <!-- akhir navbar -->

    <!-- login container -->
    <div class="container-fluid container-login">
      <div class="row justify-content-center">
        <!-- login content -->
        <div class="col-8 login-content">
          <!-- header login -->
          <div class="row login-header">
            <div class="login-title mt-4">
              <b>Daftar Anggota</b>
              <hr />
            </div>
          </div>
          <!-- akhir header  login -->
          <div class="row">
            <form action="" method="post">
              <div class="row">
                <div class="form-group col">
                  <label for="inputEmail4">Username</label>
                  <input type="text" class="form-control" id="inputEmail4" name="Username_Anggota" value="<?php if(isset($_POST["Daftar_Anggota"])){ echo $_POST['Username_Anggota']; }?>" required/>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="inputPassword4">Password</label>
                  <input type="password" class="form-control" id="inputPassword4" name="Password_Anggota" value="<?php if(isset($_POST["Daftar_Anggota"])){ echo $_POST['Password_Anggota']; }?>" required/>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputPassword4.2">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="inputPassword4.2" name="Password2_Anggota" value="<?php if(isset($_POST["Daftar_Anggota"])){ echo $_POST['Password2_Anggota']; }?>" required/>
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="inputAddress">Alamat</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan alamat anda" name="Alamat_Anggota" value="<?php if(isset($_POST["Daftar_Anggota"])){ echo $_POST['Alamat_Anggota']; }?>" required/>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                  <select class="form-select" aria-label="Default select example" name="JK" required>
                    <option selected value="none">Lihat Pilihan</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <button type="submit" class="btn btn-primary" name="Daftar_Anggota">Daftar</button>
                </div>
              </div>
            </form>
          </div>
          <!-- akhir login content -->
          <!-- footer login -->
          <div class="row footer-login">
            <div class="link-login">
              <p>Sudah menjadi anggota? <a href="login-anggota.php">Login Disini</a></p>
            </div>
            <div class="link-login">
              <p>Anda petugas? <a href="login-petugas.php">Login Disini</a></p>
            </div>
          </div>
          <!-- akhir login footer -->
        </div>
      </div>
    </div>
    <!-- akhir login container -->

    <!-- footer -->
    <footer class="login-footer">
      <div class="container-fluid">
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
  </body>
</html>
