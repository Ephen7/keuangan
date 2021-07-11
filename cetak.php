<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Keuangan Gereja</title>
</head>
<body>
    <center>
        <img src="assets/img/Kop_surat.jpg" alt="image" height="100" width="100%" />
        <h2>Laporan Keuangan GBI ANUGERAH ALLAH</h2>
        <hr />
    </center>
    <table border="1" style="width: 100%">
        <tr>
            <th width="1%">No</th>
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
                                        <td colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($totalmasuk).",-"?></td>
                                    </tr> 
                                    <tr>
                                        <th colspan="4">Total kas keluar</th>
                                        <td colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($totalkeluar).",-"?></td>
                                    </tr> 
                                    <tr>
                                        <th colspan="4">Saldo Akhir</th>
                                        <td colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($total).",-"?></td>
                                    </tr> 
    </table>
    <p align="right"> Jakarta,  <?php echo date('d-m-Y');?><br/><br/><br/><br/><u>Liem Tayen, S.Th.</u><br/>Gembala Sidang</p>  
    <script>
        window.print();
    </script>
</body>
</html>