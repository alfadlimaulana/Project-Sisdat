<?php  

require 'functions.php';

//$Kode_Buku = $_GET["Kode_Buku"];

//cek berhasil atau tidak
  if(hapus($_GET["Kode_Buku"]) > 0){
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php';
          </script>";
  }else{
    echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'index.php';
          </script>";
  }

?>