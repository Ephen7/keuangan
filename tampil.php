<?php
$koneksi = mysqli_connect("localhost","root","","keuangan");
 
$data = mysqli_query($koneksi,"select * from kas"); 


header("location:index.php?page=laporan");

?>