<?php
$koneksi = mysqli_connect("localhost","root","","keuangan");
 
// menangkap data id yang di kirim dari url
$id = isset($_GET['id']) ? $_GET['id'] : '';
 
 
// menghapus data dari database
$data = mysqli_query($koneksi,"delete from kas where kode='$id'");

if ($data) {
  									?>
  										<script type="text/javascript">
  											alert("Hapus Data Berhasil");
  											window.location.href="?page=masuk";
  										</script>
  									<?php

  								}
?>