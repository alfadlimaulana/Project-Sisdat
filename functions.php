<?php 
// Koneksi ke database

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

// Koneksi ke database
function query($query){
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];

	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function upload(){
	$nama_file = $_FILES["Gambar"]["name"];
	$ukuran_file = $_FILES["Gambar"]["size"];
	$error = $_FILES["Gambar"]["error"];
	$temp = $_FILES["Gambar"]["tmp_name"];

	//cek gambar dipuload

	if($error === 4){
		echo "<script>
				alert('Pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	//cek yg diupload harus gambar
	$ekstensi_valid = ['jpg', 'jpeg', 'png', 'gif'];
	//split nama file
	$ekstensi_file = explode('.', $nama_file);
	//amnil ektensi
	$ekstensi_file = strtolower(end($ekstensi_file));
	//cek ekstensi valid
	if(!in_array($ekstensi_file, $ekstensi_valid)){
		echo "<script>
				alert('Yang diupload bukan gambar!');
			  </script>";
		return false;
	}

	//cek ukuran
	if($ukuran_file > 5000000){
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	//lolos cek, gambar diumpload

	//buat nama baru
	$nama_file_baru = uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $ekstensi_file;
	
	//upload ke directory
	move_uploaded_file($temp, 'img/Buku/' . $nama_file_baru);

	//return nama file baru untuk diinsert
	return $nama_file_baru;
}


function tambah($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$Kode_Buku = htmlspecialchars($data["Kode_Buku"]);
	$Judul = htmlspecialchars($data["Judul"]);
	$Penulis = htmlspecialchars($data["Penulis"]);
	$Tahun_Terbit = htmlspecialchars($data["Tahun_Terbit"]);

	//upload gambar
	$Gambar = upload();

	if(!$Gambar){return false;}

	//query insert data

	$query = "INSERT INTO buku VALUES ('$Kode_Buku', '$Judul', '$Penulis', '$Tahun_Terbit', '$Gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	mysqli_query($conn, "DELETE FROM buku WHERE Kode_Buku = '$data'");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$Kode_Buku = htmlspecialchars($data["Kode_Buku"]);
	$Judul = htmlspecialchars($data["Judul"]);
	$Penulis = htmlspecialchars($data["Penulis"]);
	$Tahun_Terbit = htmlspecialchars($data["Tahun_Terbit"]);
	$Gambar_Lama  = htmlspecialchars($data["Gambar_Lama"]);

	//cek gambar baru atau tidak
	if($_FILES["Gambar"]["error"] === 4){
		$Gambar = $Gambar_Lama;
	}else{
		$Gambar = upload();
	}

	//query update data
	$query = "UPDATE buku SET 
				Kode_Buku = '$Kode_Buku', 
				Judul = '$Judul', 
				Penulis = '$Penulis', 
				Tahun_Terbit = '$Tahun_Terbit', 
				Gambar = '$Gambar'
			  WHERE Kode_Buku = '$Kode_Buku'
			  ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($kata_kunci){
	$query = "SELECT * FROM buku 
			  WHERE Kode_Buku LIKE '%$kata_kunci%' 
			  OR Judul LIKE '%$kata_kunci%'
			  OR Penulis LIKE '%$kata_kunci%'
			  OR Tahun_Terbit LIKE '%$kata_kunci%'
			  ";

	return query($query);
}

function daftar_petugas($data){
	global $conn;

	$Username_Petugas = strtolower(stripcslashes($data["Username_Petugas"]));
	$Password_Petugas = mysqli_real_escape_string($conn, $data["Password_Petugas"]);
	$Password2_Petugas = mysqli_real_escape_string($conn, $data["Password2_Petugas"]);
	$Alamat_Petugas = htmlspecialchars($data["Alamat_Petugas"]);
	$Telepon = htmlspecialchars($data["Telepon"]);

	//usernama harus unik

	$result = mysqli_query($conn, "SELECT Username_Petugas FROM petugas
								   WHERE Username_Petugas = '$Username_Petugas'");

	if(mysqli_fetch_assoc($result)){
		echo "<script>
            	alert('Username telah terdaftar!');
          	  </script>";

        return false;
	}

	//validasi password
	if($Password_Petugas !== $Password2_Petugas){
		echo "<script>
            	alert('Konfirmasi password tidak sesuai!');
          	  </script>";

        return false;
	}

	//enkripsi password
	$Password_Petugas_Enkripsi = password_hash($Password_Petugas, PASSWORD_DEFAULT);

	//insert petugas ke database
	mysqli_query($conn, "INSERT INTO petugas VALUES
						 ('$Username_Petugas', '$Password_Petugas_Enkripsi', '$Alamat_Petugas', '$Telepon')");

	return mysqli_affected_rows($conn);
}

function daftar_anggota($data){
	global $conn;

	$Username_Anggota = strtolower(stripcslashes($data["Username_Anggota"]));
	$Password_Anggota = mysqli_real_escape_string($conn, $data["Password_Anggota"]);
	$Password2_Anggota = mysqli_real_escape_string($conn, $data["Password2_Anggota"]);
	$Alamat_Anggota = htmlspecialchars($data["Alamat_Anggota"]);
	$JK = htmlspecialchars($data["JK"]);

	if($JK === "none"){
		echo "<script>
            	alert('Pilih Jenis Kelamin!');
          	  </script>";

        return false;
	}
	
	//usernama harus unik

	$result = mysqli_query($conn, "SELECT Username_Anggota FROM anggota
								   WHERE Username_Anggota = '$Username_Anggota'");

	if(mysqli_fetch_assoc($result)){
		echo "<script>
            	alert('Username telah terdaftar!');
          	  </script>";

        return false;
	}

	//validasi password
	if($Password_Anggota !== $Password2_Anggota){
		echo "<script>
            	alert('Konfirmasi password tidak sesuai!');
          	  </script>";

        return false;
	}

	//enkripsi password
	$Password_Anggota_Enkripsi = password_hash($Password_Anggota, PASSWORD_DEFAULT);

	//insert petugas ke database
	mysqli_query($conn, "INSERT INTO anggota VALUES
						 ('$Username_Anggota', '$Password_Anggota_Enkripsi', '$Alamat_Anggota', '$JK')");

	return mysqli_affected_rows($conn);
}

?>