<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Keuangan GBI Anugerah Allah.xls");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Download Laporan Keuangan Gereja</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
    <center>
        <h2>Laporan Keuangan GBI ANUGERAH ALLAH</h2>
    </center>
    <table border="2">
        <tr></tr>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Jenis</th>
        </tr>
        <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"select * from kas");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['kode']; ?></td>
            <td><?php echo date('d F Y', strtotime($d['tgl'])); ?></td>
            <td><?php echo $d['keterangan']; ?></td>
            <td align="right"><?php echo number_format ($d['jumlah']).",-"; ?></td>
            <td align="right"><?php echo number_format ($d['keluar']).",-"; ?></td>
            <td><?php echo $d['jenis']; ?></td>
        </tr>
        <?php 
             
            $jumlahmasuk[]    =$d['jumlah'];
            $jumlahkeluar[]    =$d['keluar'];
            }
            $totalmasuk    =array_sum($jumlahmasuk);
            $totalkeluar    =array_sum($jumlahkeluar);
            $total=$totalmasuk-$totalkeluar;
        ?>
                                    </tbody>
                                    <tr>
                                        <th colspan="4">Total kas masuk</th>
                                        <th colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($totalmasuk).",-"?></th>
                                    </tr> 
                                    <tr>
                                        <th colspan="4">Total kas keluar</th>
                                        <th colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($totalkeluar).",-"?></th>
                                    </tr> 
                                    <tr>
                                        <th colspan="4">Saldo Akhir</th>
                                        <th colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($total).",-"?></th>
                                    </tr>
                                    <tr></tr> 
    </table>
    <p align="right"> Jakarta,  <?php echo date('d-m-Y');?><br/><br/><br/><br/><u>Liem Tayen, S.Th.</u><br/>Gembala Sidang</p>  

</body>
</html>