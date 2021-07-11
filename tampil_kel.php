<?php
$koneksi = mysqli_connect("localhost","root","","keuangan");
 
$data = mysqli_query($koneksi,"select * from kas where jenis ='masuk'");


header("location:index.php?page=masuk");

?>