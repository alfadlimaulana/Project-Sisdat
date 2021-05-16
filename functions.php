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


function tambah($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$Kode_Buku = htmlspecialchars($data["Kode_Buku"]);
	$Judul = htmlspecialchars($data["Judul"]);
	$Penulis = htmlspecialchars($data["Penulis"]);
	$Tahun_Terbit = htmlspecialchars($data["Tahun_Terbit"]);
	$Gambar = htmlspecialchars($data["Gambar"]);

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
	$Gambar = htmlspecialchars($data["Gambar"]);

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


?>