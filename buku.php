<?php 
include "koneksi.php";
//Mengambil data pada table dari database MySQL
$sql = "SELECT b.id_buku,k.kategori,b.judul,b.foto,b.pengarang,b.penerbit,b.tahun_terbit,b.sinopsis FROM buku b, kategori k WHERE b.id_kategori = k.id_kategori
";
$result = mysqli_query($koneksi, $sql) 
    or die("Error in Selecting " . mysqli_error($koneksi));
//Membuat array
$buku = array();
while($row =mysqli_fetch_assoc($result))
{
  $buku[] = $row;
 
}
//Menampilkan konversi data pada tabel buku ke format JSON
echo $jsonfile = json_encode($buku, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
file_put_contents('buku.json', $jsonfile);
//close the db connection
mysqli_close($koneksi);
?>