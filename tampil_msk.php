tampil_msk.php<?php
$koneksi = mysqli_connect("localhost","root","","keuangan");
 
$data = mysqli_query($koneksi,"select * from kas where jenis ='keluar'");


header("location:index.php?page=keluar");

?>