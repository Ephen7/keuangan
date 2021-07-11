<?php
$koneksi = mysqli_connect("localhost","root","","keuangan");
 
// menangkap data id yang di kirim dari url
$id = isset($_GET['id']) ? $_GET['id'] : '';
 
 
// menghapus data dari database
$data = mysqli_query($koneksi,"delete from user where id='$id'");

header("location:index.php?page=user");

?>